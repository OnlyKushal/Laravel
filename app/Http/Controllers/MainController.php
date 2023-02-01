<?php

namespace App\Http\Controllers;

use App\Models\Banner_data;
use App\Models\Catagories;
use App\Models\catagories_data;
use Illuminate\Http\Request;
use App\Models\Products_data;


class MainController extends Controller
{
    //
    public function about(){
        return view('about');
    }
    public function index(){
        $banner = Banner_data::where('status',1)->get();
        $product = Products_data::where('status',1)->get();
        return view('index',['product'=> $product,'banner'=>$banner]);
    }
    public function men(){
        $catagory = Catagories_data::where('type','men')->where('status',1)->get();
        $product = Products_data::where('type','men')->where('status',1)->get();
        return view('men',['product'=>$product,'catagory'=>$catagory]);
    }
    public function ordercomplete(){
        return view('order-complete');
    }
    public function productdetails($name){
        $product = Products_data::where('name',$name)->where('status',1)->first();
        return view('product-detail',['product'=>$product]);
    }
    public function women(){
        $catagory = Catagories_data::where('type','women')->where('status',1)->get();
        $product = Products_data::where('type','women')->where('status',1)->get();
        return view('women',['product'=>$product,'catagory'=>$catagory]);
    }
    public function checkout(){
        return view('checkout');
    }
    public function cart(){
        return view('cart');
    }
    public function addtowishlist(){
        return view('add-to-wishlist');
    }
    public function contact(){
        return view('contact');
    }
    public function defult($name){
        $sub = catagories_data::where('name',$name)->where('status',1)->first();
        return view('defult',['sub'=>$sub]);
    }
    

   
    
}
