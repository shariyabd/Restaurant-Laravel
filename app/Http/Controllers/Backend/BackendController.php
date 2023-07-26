<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class BackendController extends Controller
{
    public function index(){
        $user = Auth::user();
        $userName = $user->name;
        return view('backend.dashboard', ['userName' => $userName]);
    
        // return view('backend.modules.dashboard',compact('userName'));
        // return view('backend.modules.dashboard',['userName' => $userName]);
    }
}
