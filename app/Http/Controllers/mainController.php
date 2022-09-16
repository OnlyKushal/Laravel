<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Mail\EnquiryMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Bannertable;
use App\Models\Featuredproductsdata;
use App\Models\Pagesdata;
use App\Models\Pagesimagesdata;
use App\Models\Subpagedata;

class mainController extends Controller
{
    //
    // public function aboutus(){

    //     return view('about-us');
    // }
    // public function bedroom(){
    //     return view('bed-room');
    // }
    // public function contact(){
    //     return view('contact');
    // }
    // public function corporateoffice(){
    //     return view('corporate-office');
    // }
    // public function customerstories(){
    //     return view('customer-stories');
    // }
    // public function diningroom(){
    //     return view('dining-room');
    // }
    // public function hotelrestaurant(){
    //     return view('hotel-restaurant');
    // }
    public function defaultpage($slug){

        $subpage1 = Subpagedata::all();
        $page1 = Pagesdata::all();

        if(Subpagedata::where('slug','=',$slug)->first()){
            $page = Subpagedata::where('slug','=',$slug)->first();
            $image = Pagesimagesdata::where('pagename','=',$slug)->first();
        }else{
            $page = pagesdata::where('slug','=',$slug)->first();
            $image = Pagesimagesdata::where('pagename','=',$slug)->first();
        }
        
        return view('defaultpage',['data'=>$page,'image'=>$image,'pages'=>$page1,'subpage'=>$subpage1]);
    }

    public function index(){
        $subpage1 = Subpagedata::all();
        $page = Pagesdata::all();
        $data = Bannertable::where('status','=',1)->get();
        $data2 = Featuredproductsdata::where('status','=',1)->get();

        return view('index',['data'=> $data,'data2'=>$data2,'pages'=>$page,'subpage'=>$subpage1]);
    }
    public function enquiry(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phnum'=>'required|max:10',
            'comment'=>'required',
        ]);

        $enquiry = new Enquiry;
        $enquiry->name = $request->name;
        $enquiry->email = $request->email;
        $enquiry->phnum = $request->phnum;
        $enquiry->comment = $request->comment;
        $enquiry->status = 1;
        $enquiry->save();
        $data = [
            'name' => $request->name,
            'phnum' => $request->phnum,
            'comment' => $request->comment,
        ];
        Mail::to($request->email)->send(new EnquiryMail($data));
        return view('/thankyou');
    }

    
    public function thankyou(){
        return view('thankyou');
    }
    public function kitchen(){
        return view('kitchen');
    }
    public function livingroom(){
        return view('living-room');
    }
    public function showroominterior(){
        return view('showroom-interior');
    }
    public function termsconditions(){
        return view('terms-conditions');
    }
   
  
}
