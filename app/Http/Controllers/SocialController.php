<?php

namespace App\Http\Controllers;

use App\Mail\PasswordMail;
use App\Models\Admin;
use App\Models\Admin_data;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Validation\ValidationData;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;



class SocialController extends Controller
{
    public function gitredirect(){
        return Socialite::driver('github')->redirect();
    }
    public function gitcallback(){
        $user = Socialite::driver('github')->user();
        $Admin_data = Admin_data::where('email',$user->email)->first();
            echo $Admin_data;
            if($Admin_data != ""){
                    session()->put('ADMIN_ID',$Admin_data->id);
                    session()->put('ADMIN_LOGIN',true);
                    return redirect('dashboard');
            }else{
                $data = new Admin;
                $data->username = substr($user->name,0,5).time();
                $data->email = $user->email;
                $temp_password = rand(1000,5000);
                $data->password = Hash::make($temp_password);
                $data->social_pass = $user->id;
                $data->auth_type = 'github';
                $data->save();
                $maildata =
                [
                    'name' => $user->name,
                    'password' => $temp_password,
                ];
                Mail::to($user->email)->send(new PasswordMail($maildata));

                return redirect('admin')->with('msg','Your temporary password send to your email!!!');
        }

        
    }
    public function googleredirect(){
        return Socialite::driver('google')->redirect();
    }
    public function googlecallback(){

        $user = Socialite::driver('google')->user();
        
            $Admin_data = Admin_data::where('email',$user->email)->first();
            echo $Admin_data;

            if($Admin_data != ""){
                    session()->put('ADMIN_ID',$Admin_data->id);
                    session()->put('ADMIN_LOGIN',true);
                    return redirect('dashboard');
            }else{
                $data = new Admin;
                $data->username = substr($user->name,0,5).time();
                $data->email = $user->email;
                $temp_password = rand(1000,5000);
                $data->password = Hash::make($temp_password);
                $data->social_pass = $user->id;
                $data->auth_type = 'google';
                $data->save();
                $maildata =
                [
                    'name' => $user->name,
                    'password' => $temp_password,
                ];
                Mail::to($user->email)->send(new PasswordMail($maildata));

                return redirect('admin')->with('msg','Your temporary password send to your email!!!');
        }
        
    }
    

}
