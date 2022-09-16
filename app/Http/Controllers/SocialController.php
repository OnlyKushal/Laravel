<?php

namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;



class SocialController extends Controller
{
    public function redirect(){
        return Socialite::driver('github')->redirect();
    }
    public function callback(){
        $user = Socialite::driver('github')->user();
        print_r($user);
        echo($user->name);
        // echo($user->Bio);
        
    }
    public function googleredirect(){
        return Socialite::driver('google')->redirect();
    }
    public function googlecallback(){
        $user = Socialite::driver('google')->user();
        
        
        echo($user->name);
        echo($user->id);
        // echo($user->email);


        // echo($user->Bio);
        
    }
    

}
