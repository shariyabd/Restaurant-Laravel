<?php

namespace App\Http\Controllers\Backend;

use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SocialController extends Controller
{

    public function facebookredirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function loginWithFacebook()
    {
        $user = Socialite::driver('facebook')->stateless()->user();
        $findUser = User::where('facebook_id', $user->id)->first();

        if ($findUser) {
            Auth::login($findUser);
            return redirect('dashboard');
        } else {
            $existingUser = User::where('email', $user->email)->first();

            if ($existingUser) {
                // User with the same email already exists, so you can update their record
                $existingUser->facebook_id = $user->id;
                $existingUser->save();

                Auth::login($existingUser);
            } else {
                $newUser = new User();
                $newUser->name = $user->name;
                $newUser->email = $user->email;
                $newUser->facebook_id = $user->id;
                $newUser->password = bcrypt('123456');
                $newUser->save();

                Auth::login($newUser);
            }

            return redirect('dashboard');
        }
    }
    public function googleredirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function loginWithGoogle()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $findUser = User::where('google_id', $user->id)->orWhere('email', $user->email)->first();

        if ($findUser) {
            if ($findUser->google_id === null) {
                // User already exists without Google login, so update their record
                $findUser->google_id = $user->id;
                $findUser->save();
            }

            Auth::login($findUser);
        } else {
            $new_user = new User();
            $new_user->name = $user->name;
            $new_user->email = $user->email;
            $new_user->google_id = $user->id;
            $new_user->password = bcrypt('12345678');
            $new_user->save();

            Auth::login($new_user);
        }

        return redirect('dashboard');
    }

   
}
