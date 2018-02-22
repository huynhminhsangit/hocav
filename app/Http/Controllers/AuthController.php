<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Illuminate\Support\Facades\Auth;
use Socialite;
class AuthController extends Controller
{
    public function redirectgoogle() {

        return Socialite::driver('google')->redirect();
    }
    public function handlegoogle() {
        // Get github's user infomation
        $user = Socialite::driver('google')->user();
        if(Auth::guard('client')->attempt(['id_auth' => $user->getId(),'password' => '']))
            {
                Auth::guard('client')->login();

               return redirect('/'); 
           }
           else
           {
            $createdclient = Client::firstOrCreate([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'avatar' => $user->getAvatar(),
                'id_auth' => $user->getId(),
            ]);

            Auth::guard('client')->login($createdclient);

            return redirect('/');
        }

    }
    public function redirectfacebook() {

        return Socialite::driver('facebook')->redirect();
    }
    public function handlefacebook() {
        // Get github's user infomation
        $user = Socialite::driver('facebook')->user();
        if(Auth::guard('client')->attempt(['id_auth' => $user->getId(),'password' => '']))
            {
                Auth::guard('client')->login();

               return redirect('/'); 
           }
           else
           {
            $createdclient = Client::firstOrCreate([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'avatar' => $user->getAvatar(),
                'id_auth' => $user->getId(),
            ]);

            Auth::guard('client')->login($createdclient);

            return redirect('/');
        }
    }
    public function logout(Request $request)
    {
        Auth::guard('client')->logout();

        $request->session()->flush();

        return redirect('/');
    }
}
