<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
class LoginGoogleController extends Controller
{
   public function redirectToGoogle()

    {

        return Socialite::driver('google')->redirect();

    }
   public function handleGoogleCallback()

    {

        try {

      

            $user = Socialite::driver('google')->stateless()->user();

       

            $finduser = User::where('google_id', $user->id)->first();

       

            if($finduser){

       

                Auth::login($finduser);

      

                return redirect()->route('home');

       

            }else{

                $newUser = User::create([

                    'name' => $user->name,

                    'email' => $user->email,

                    'google_id'=> $user->id,

                    'password' => encrypt('123456789')

                ]);

      

                Auth::login($newUser);

      

                return redirect()->intended('dashboard');

            }

      

        } catch (Exception $e) {

            dd($e->getMessage());

        }

    }
}
