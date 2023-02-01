<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Admin_data;
use App\Models\Banner;
use App\Models\Banner_data;
use App\Models\Catagories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\catagories_data;
use App\Models\Products;
use App\Models\Products_data;

class AdminController extends Controller
{
    //
    public function login(){
        return view('admin/login');
    }
    public function index(){
        return view('admin/index');
    }

    public function loginpost(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $user = Admin_data::where('email',"=",$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('ADMIN_ID',$user->id);
                $request->session()->put('ADMIN_LOGIN',true);
                    return redirect('dashboard');
                }
                else{
                    return back()->with('error','Wrong Cradentials !!');
                }
        }
        else{
            return back()->with('error','Wrong Cradentials !!');
        }

    }


    public function registerget(){
        return view('admin/register');
    }

    public function adminregister(Request $request){
        $data = new Admin();

        $request->validate([
            'name'=>'required|unique:admins',
            'email' => 'required|email|unique:admins',
            'password' => 'required'
        ]);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->save();
        return redirect('admin')->with('msg','Registration sucessfully!!!');
    }

    public function adminupdate(){
        return view('admin/accountupdate');
    }

    public function adminupdatepost(request $request){

        $data = Admin_data::where('id',"=",session()->get('ADMIN_ID'))->first();
        if($request->name != null){
            $data->name = $request->name;
            $request->validate([
                'name' => 'unique:admins',
            ]);
        }
            //image update

            if($request->file('admin_image')){
                $file_name = uniqid().'.'.$request->file('admin_image')->extension();
                if($data->image != ""){
                    unlink(public_path('adminimage/').$data->image );
                }
                $request->file('admin_image')->move(public_path('adminimage/'),$file_name);
                $data->image = $file_name;
            }
            $data->update();
            return redirect('/dashboard')->with('msg','Details updated Successfully !!');
        }

    public function adminpassword(){
        return view('admin/password');
    }

    public function adminpasswordpost(Request $request){
        $data = Admin_data::where('id',"=",session()->get('ADMIN_ID'))->first();
        //password checking
        if($request->newpassword != ""){
                if($request->confirmpassword == ""){
                    return back()->with('error_conf','Confirm password filed is requried');
                }
                elseif($request->newpassword != $request->confirmpassword){
                    return back()->with('error_conf','Confirm password must be same');
                }else{
                    $data->password = hash::make($request->newpassword);
                }
            }elseif($request->confirmpassword != ""){
                return back()->with('error_new','New password filed is requried');
            }
        $data->update();
        return redirect('/dashboard')->with('msg','Password updated Successfully !!');

    }
    public function catagories(){
        $data = catagories_data::all();
        return view('admin/catagories',['data'=>$data]);
    }
    public function createcatagories(){
        return view('admin/createcatagories');
    }
    public function createcatagoriespost(Request $request){
        $catagories = new Catagories();
        $request->validate([
            'name'=>'required|unique:catagories,name',
            'type'=>'required'
        ]);
        $catagories->name = $request->name;
        $catagories->type = $request->type;
        $catagories->status = 1;
        if($request->file('image')){
            $file_name = uniqid().'.'.$request->file('image')->extension();
            $request->file('image')->move(public_path('catagoriesimage/'),$file_name);
            $catagories->image = $file_name;
        }
        $catagories->save();
        return redirect('catagories')->with('msg','Catagory added Successfully !!');
    }
    public function products(){
        $products = Products::all();
        return view('admin/products',['data'=>$products]);
    }
    public function createproducts(){
        return view('admin/createproducts');
    }
    public function catagoriesget(Request $request){
        $catagories = catagories_data::where('type',$request->type)->get();
        if($catagories){
            return response()->json(['catagories' => $catagories]);
        }else{

            return response()->json(['catagories' => null]);
        }
        
    }
    public function createproductspost(Request $request){
        $request->validate([
            'name'=>'required|unique:products,name',
            'price'=>'required',
            'description'=>'required',
        ]);

        $products = new products();
        $products->name = $request->name;
        $products->category = $request->catagories;
        $products->type = $request->type;
        $products->price = $request->price;
        $products->status = 1;
        $products->descriptions = $request->description;
        if($request->hasfile('image'))
            {
                foreach ($request->file('image') as  $value) {
                    $file_type = $value->extension();
                    $filename = uniqid().".".$file_type;
                    $value->move(public_path('product_image/'),$filename);
                    $pagesimage[] = $filename;
                }
               
            }
        $products->images = implode(',',$pagesimage);
        $products->save();
        return redirect('products')->with('msg','Product Created Successfully!!');


    }
    public function productstatus($id){
        $getStatus = Products::select('status')->where('id','=',$id)->first();
 
        if( $getStatus->status== 1){
             $status = 0;
        }else{
             $status = 1;
        }
        $getStatus::where('id',"=",$id)->update(['status' => $status]);
        return redirect()->back();
    }
    public function catagoriesstatus($id){
        $getStatus = Catagories::select('status')->where('id','=',$id)->first();
 
        if( $getStatus->status== 1){
             $status = 0;
        }else{
             $status = 1;
        }
        $getStatus::where('id',"=",$id)->update(['status' => $status]);
        return redirect()->back();
    }
    
    public function banner(){
        $banner = Banner_data::where('status',1)->get();
        return view('admin/banner',['banner'=>$banner]);
    }
    public function bannerstatus(){
        
    }
    public function createbanner(){
        return view('admin/createbanner');
    }
    public function createbannerpost(Request $request){
        $Banner = new Banner();
        $request->validate([
            'name'=>'required|unique:banners,name',
            
        ]);
        $Banner->name = $request->name;
        $Banner->descriptions = $request->description;
        $Banner->status = 1;
        if($request->file('image')){
            $file_name = uniqid().'.'.$request->file('image')->extension();
            $request->file('image')->move(public_path('bannerimages/'),$file_name);
            $Banner->images = $file_name;
        }
        $Banner->save();
        return redirect('banner')->with('msg','Banner added Successfully !!');
    }

    public function logout(){
        session()->forget('ADMIN_ID');
        session()->forget('ADMIN_LOGIN');
        return redirect('/admin');
    }


}
