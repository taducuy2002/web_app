<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class LoginFacebookController extends Controller
{
    public function redirectToFacebook()

    {

        return Socialite::driver('facebook')->redirect();

    }
    public function handleFacebookCallback()

    {

        try {

        

            $user = Socialite::driver('facebook')->user();

         

            $finduser = User::where('facebook_id', $user->id)->first();

        

            if($finduser){

         

                Auth::login($finduser);

        

                return redirect()->intended('dashboard');

         

            }else{

                $newUser = User::create([

                    'name' => $user->name,

                    'email' => $user->email,

                    'facebook_id'=> $user->id,

                    'password' => encrypt('123456dummy')

                ]);

        

                Auth::login($newUser);

        

                return redirect()->intended('dashboard');

            }

        

        } catch (Exception $e) {

            dd($e->getMessage());

        }

    }


}
