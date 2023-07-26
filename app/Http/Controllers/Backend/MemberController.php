<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Menu;
use Illuminate\Http\Request;
use File;
use Session;
class MemberController extends Controller
{
    
    public function createMember(){
       $userName = app(BackendController::class)->index()->getData()['userName'];  
        return view('backend.modules.member.create-member', compact('userName'));
       
    }

    public function storeMember(Request $request){
        
        $request->validate(
            [
                'file'=>'required|mimes:jpeg,jpg,png',
                'name'=>'required',
                'role'=>'required'
            ]
            );

            $imageName = "";

            if($image = $request->file('file')){
                $imageName = uniqid().'.'.$image->getClientOriginalExtension();
                $image->move('image/',$imageName);
            }

            $insert = new Member();

            $insert->name = $request->input('name');
            $insert->role = $request->input('role');
            $insert->status = $request->input('status');
            $insert->file = $imageName; // Assuming you have an 'image' column in your 'members' table
            
            // Set any other attributes as needed
            
            // Save the member record to the database
            $insert->save();


            return redirect()->back()->with('success', 'Member Added successfully');


    }

    public function memberManage(){
        $userName = app(BackendController::class)->index()->getData()['userName'];  

        $members = Member::all();
        return view('backend.modules.member.manage-member  ', compact('userName','members'));
    }


    public function editMember($id){
        $userName = app(BackendController::class)->index()->getData()['userName'];

        $member = Member::findOrFail($id);
        return view('backend.modules.member.editmember', compact('userName','member'));

        
    }

    public function updateMember(Request $request, $id){
        $member = Member::findorFail($id);
        
        $request->validate([
            'file'=>'nullable|mimes:jpeg,jpg,png',
            'name'=>'required',
            'role'=>'required',
            'status'=>'required'
        ]);

        $imageName = "";
        $oldImage = "image/".$member->file;

       if($image = $request->file('file')){
            if(file_exists($oldImage)){
                File::delete($oldImage);
            };

            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('image/', $imageName);

           

            
       }else{
         $imageName = $member->file;
       }
       
       Member::where('id', $id)->update([
        'file' => $imageName,
        'name' => $request->name,
        'role' => $request->role,
        'status' => $request->status,
    ]);
    

       Session::flash('cls', 'success');
       Session::flash('msg','Member Updated Successfully');
       return redirect()->back();
    }

    public function showMember($id){
        $userName = app(BackendController::class)->index()->getData()['userName'];

        $member = Member::findOrFail($id);
        return view('backend.modules.member.showmember', compact('userName','member'));
    }

    public function deleteMember($id){
        $member = Member::findOrfail($id);
        $oldImage = "image/".$member->file;

        if(file_exists($oldImage)){
            File::delete($oldImage);
            $member->delete();

            Session::flash('cls', 'error');
            Session::flash('msg','Member Delete Successfully');
            return redirect()->back();
        }
    }
}
 