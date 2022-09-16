<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Userdata;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
                return ['result'=> 'success'];
            }
            else{
                return ['result'=> 'notesuccess'];
            }
        }
       
    }
    public function finduser($email){
        $user = Userdata::where('email',$email)->first();
        return ['result'=>$user];
    }
}
