<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Session;
use File;

class NewsController extends Controller
{

    public function addNews(){
        $userName = app(BackendController::class)->index()->getData()['userName'];
        return view('backend.modules.news.addnews', compact('userName'));
    }

    public function newsStore(Request $request){
        
        $request->validate([
            'file' => 'required|mimes:jpeg,jpg,png',
            'title' => 'required',
            'description' => 'required|max:900',
            'second_title' => 'required',
            'second_description' => 'required|max:400',
            'category' => 'required',
            'status' => 'required',
        ],[
            'second_description.required' => 'You can not give more then 400 charecters'
        ]);

        $imageName = "";
        if($image = $request->file('file')){
            $imageName = uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('image/',$imageName);
        }

        News::create([
            'file' => $imageName,
            'title' => $request->title,
            'description' => $request->description,
            'second_title' => $request->second_title,
            'second_description' => $request->second_description,
            'category' => $request->category,
            'status' => $request->status,
        ]);
        

        Session::flash('cls', 'success');
        Session::flash('msg','News Added Successfully');
        return redirect()->back();
        
    }

    public function newsManage(){

        $userName = app(BackendController::class)->index()->getData()['userName'];

        $news = News::all();
        return view('backend.modules.news.managenews', compact('userName', 'news'));
    }

    public function editNews(Request $request, $id){
        $userName = app(BackendController::class)->index()->getData()['userName'];

        $news = News::findOrfail($id);
        return view('backend.modules.news.newsedit', compact('userName','news'));
    }

    public function showNews(Request $request, $id){
        $userName = app(BackendController::class)->index()->getData()['userName'];

        $news = News::findOrfail($id);

        return view('backend.modules.news.newsshow', compact('userName','news'));
    }

    public function updateNews(Request $request, $id){
        $news = News::findOrfail($id);
        $request->validate([
            'file' => 'nullable|mimes:jpeg,jpg,png',
            'title' => 'required',
            'description' => 'required|max:900',
            'second_title' => 'required',
            'second_description' => 'required|max:400',
            'category' => 'required',
            'status' => 'required',
        ],[
            'second_description.required' => 'You can not give more then 400 charecters'
        ]);

        $imageName = "";
        $oldImage = "image/".$news->file;
        if($image = $request->file('file')){
            if(file_exists($oldImage)){
                File::delete($oldImage);
            }
            $imageName = uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('image/',$imageName);
        } else{
            $image = $news->file;
        }

        
        News::where('id', $id)->update([
            'file' => $imageName,
            'title' => $request->title,
            'description' => $request->description,
            'second_title' => $request->second_title,
            'second_description' => $request->second_description,
            'category' => $request->category,
            'status' => $request->status,
        ]);
        

        Session::flash('cls', 'success');
        Session::flash('msg','News Updated Successfully');
        return redirect()->back();
    }

    public function deleteNews(Request $request, $id){
        $news = News::findOrfail($id);
        
        $oldImage = "image/".$news->file;

        if(file_exists($oldImage)){
            File::delete($oldImage);

            $news->delete();
            Session::flash('cls', 'error');
            Session::flash('msg','News Delete Successfully');
            return redirect()->back();
        }

    }
}
