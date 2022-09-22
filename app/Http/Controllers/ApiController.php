<?php

namespace App\Http\Controllers;

use App\Mail\ForgetPasswordMail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Userdata;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use App\Models\PasswordReset;
use Illuminate\Auth\Passwords\PasswordResetServiceProvider;



class ApiController extends Controller
{

    public function usershow(){
        $user = Userdata::all();
        return ['result'=>$user];
    }
    
    public function upadateuserdetails(Request $request){

        $validation = Validator::make($request->all(),[
            'email' =>'required|exists:users,email',
            'new_email' => 'required|email|unique:users,email',
            'new_name' => 'required|unique:users,name',
            'new_password' => 'required'
        ]);

        if($validation->fails()){
            $errors = $validation->errors();
            return response()->json(['errors'=>$errors],403);
        }else{
            $user_data = Userdata::where('email',$request->email)->first();
            $user_data->name = $request->new_name;
            $user_data->email = $request->new_email; 
            $user_data->password = $request->new_password; 
            $user_data->update();
            if($user_data->update()){
                return ['result'=>"Success"];
            }else{
                return ['result'=>"not success"];
            }
        }
    }

    public function deleteuser($email){
        $user_data = Userdata::where('email',$email)->first();
        if(Userdata::where('email',$email)->first()){
            $user_data->delete();
            return ["result"=>'success'];
        }else{
            return ['result'=>'user not found'];
        }
    }

    public function userregistration(Request $request){

        $validation = Validator::make($request->all(),[
            'name'=>'required|unique:users,name',
            'email'=>'required|email|unique:users,email',
            'password'=>'required',
        ]);

        if($validation->fails()){
            $error = $validation->errors();
            return response()->json([
                'error'=> $error
            ],403);

        }else{
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            if($user->save()){
                return response()->json([
                    'status'=> true,
                    'message' => 'User created'
                ],403);
            }
            else{
                return ['status'=> false,
                'message' => 'not success'];
            }
        }
       
    }
    public function userlogin(Request $request){
        $validation = Validator::make($request->all(),[
            'email' =>'required',
            'password'=>'required'
        ]);

        if($validation->fails()){
            $errors = $validation->errors(); 
            return response()->json([
                'error'=> $errors
            ],403);
        }

        $user = Userdata::where('email',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                return response()->json([
                    'status'=> true,
                    'result'=> "login Successful",
                    'token' => $user->createToken("LOGIN TOKEN")->plainTextToken 
                ],403);
            }else{
                return response()->json([
                    'status'=> false,
                    'result'=> "Wrong Credentials",
                ]);
            }
        }else{
            return response()->json([
                'status'=> false,
                'result'=> "Wrong Credentials",
            ]);
        }
    }
    public function logout(){
        // Get access token from database
        auth()->user()->tokens()->delete();
        // $token = PersonalAccessToken::findToken($token);
        // // Revoke token
        // $token->delete();
        return response()->json([
            'result'=> 'success',
        ]);
    }


    public function finduser($email){
        $user = Userdata::where('email',$email)->first();
        return ['result'=>$user];
    }

    public function forgetpass(Request $request){
        $validation = Validator::make($request->all(),[
            'email' => 'required'
        ]);
        if($validation->fails()){
            $error = $validation->errors();
            return response()->json([
                'error'=>$error
            ]);
        }
            $email = $request->email;
            if(Userdata::where('email',$email)->first()){
                
                    $token = Str::random(20);
                    $domain = URL::to('/');
                    $url = $domain."/reset-password?token=".$token;
                    $maildata = [
                        'url' => $url,
                        'email'=> $email
                    ];
                    Mail::to($email)->send(new ForgetPasswordMail($maildata));
                    $datetime = Carbon::now()->format('Y-m-d H:i:s');
                    
                    PasswordReset::create([
                        'email'=>$email,
                        'token'=>$token,
                        'created_at'=>$datetime
                    ]);

                    return response()->json([
                        'status'=>true,
                        'message'=>"please check your email to change your password",
                    ]);
            }else{
                return response()->json([
                    'status'=>false,
                    'message'=>'Wrong Credential',
                ]);
            }
            

    }
    public function resetpassword(Request $request){
        

    }

    public function resetpasswordpost(){
        

    }




}
