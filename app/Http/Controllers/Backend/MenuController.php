<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Menu;
use Session;
use File;

class MenuController extends Controller
{
    public function addMenu(Request $request)
    {
        $userName = app(BackendController::class)->index()->getData()['userName'];
 
        return view('backend.modules.menu.addmenu', compact('userName'));
    }

    public function menuStore(Request $request){
        $request->validate(
            [
                'food_name' => 'required | max:30',
                'file' => 'required|mimes:jpeg,jpg,png',
                'price' => 'required',
                'review' => 'required|integer|max:5',
                'category' => 'required',
                'status' => 'required',
            ]
            );
            // ,[
            //     'food_name.required' => 'Enter Food Name ',
            //     'file.required' => 'Enter Food Image ',
            //     'price.required' => 'Enter Food Price ',
            //     'category.required' => 'Select Food Category ',
            //     'status.required' => 'Select Food Status ',
            // ]

            $imageName = "";
            if($image = $request->file('file')){
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move('image/',$imageName);
            }

            Menu::create([
                'food_name' => $request->food_name,
                'file' => $imageName,
                'price' => $request->price,
                'review' => $request->review,
                'category' => $request->category,
                'status' => $request->status,
            ]);

            // $request->session()->flash('key', $value);
            Session::flash('cls', 'success');
            Session::flash('msg','Menu Added Successfully');
            return redirect()->back();
            // $request->session()->flash('key', $value);
    }

    public function manageMenu(){
        $userName = app(BackendController::class)->index()->getData()['userName'];
 

        $menus = Menu::paginate(5);
        
        return view('backend.modules.menu.managemenu', compact('userName', 'menus'));

    }

    
    public function editMenu($id){
        $userName = app(BackendController::class)->index()->getData()['userName'];
        
        $menu = Menu::findOrFail($id);

         return view('backend.modules.menu.editmenu', compact('userName','menu'));

    }

    public function updateMenu(Request $request, $id){

        $menu = Menu::findOrFail($id);

        $request->validate(
            [
                'food_name' => 'required|max:30',
                'file' => 'nullable|mimes:jpeg,jpg,png',
                'price' => 'required',
                'review' => 'required|integer|max:5',
                'category' => 'required',
                'status' => 'required'
            ]
            );
            // ,[
            //     'food_name.required' => 'Enter Food Name ',
            //     'file.required' => 'Enter Food Image ',
            //     'price.required' => 'Enter Food Price ',
            //      'review.max' => 'Please enter a value under 6 for the rating.',
            //     'category.required' => 'Select Food Category ',
            //     'status.required' => 'Select Food Status ',
            // ]

            $imageName = "";
            $oldImage = "image/".$menu->file;
            if($image = $request->file('file')){
                if(file_exists($oldImage)){
                    File::delete($oldImage);
                };
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move('image/',$imageName);
            
            }else{
                $imageName = $menu->file;
            }

            Menu::where('id', $id)->update([
                'food_name' => $request->food_name,
                'file' => $imageName,
                'price' => $request->price,
                'review' => $request->review,
                'category' => $request->category,
                'status' => $request->status,
            ]);

            // $request->session()->flash('key', $value);
            Session::flash('cls', 'success');
            Session::flash('msg','Menu Updated Successfully');
            return redirect()->back();
    }

    public function showMenu(Request $request, $id){
        $userName = app(BackendController::class)->index()->getData()['userName'];

        $menu = Menu::findOrFail($id);
        return view('backend.modules.menu.showmenu',compact('userName', 'menu'));
    }

    public function deleteMenu($id){
        $menu = Menu::findOrfail($id);
        $oldImage = "image/".$menu->file;

        if(file_exists($oldImage)){
            File::delete($oldImage);

            $menu->delete();

            Session::flash('cls', 'error');
            Session::flash('msg','Menu Delete Successfully');
            return redirect()->back();
        }
    }
}
