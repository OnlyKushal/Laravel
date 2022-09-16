<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Featuredproducts;
use App\Models\Featuredproductsdata;

class featuredproductController extends Controller
{
    //
    public function featuredproduct(){
        $featuredproduct =  Featuredproductsdata::all();
        return view('admin/featuredproduct',['data' => $featuredproduct]);
    }

    public function createfeaturedproduct(){
        return view('admin/createfeaturedproduct');
    }

    public function createfeaturedproductpost(Request $request){
        $data = new Featuredproducts;
        $request->validate([
            'title' => "required | unique:featuredproducts",
            'image' => 'required'
        ]);

        $data->title = $request->title;

        if ($request->status != 1) {
            $data->status = 0;
        }else{
            $data->status = $request->status;
        }

        if($request->file('image')){
            $file_name = uniqid().'.'.$request->file('image')->extension();
            $request->file('image')->move(public_path('productimage/'),$file_name);
            $data->image = $file_name;
        }

        $data->save();
        return redirect('/featuredproduct')->with('msg','Product created succesfull !!');
    }
    public function productchangeStatus($id){
        $getStatus = Featuredproducts::select('status')->where('id','=',$id)->first();
 
        if( $getStatus->status== 1){
             $status = 0;
        }else{
             $status = 1;
        }
        
        $getStatus::where('id',"=",$id)->update(['status' => $status]);
 
        return redirect()->back();
       
 
     }    
     public function updatefeaturedproduct($id){
        $featuredproduct =  Featuredproductsdata::where('id','=',$id)->first();
        return view('admin/featuredproductedit',['data' => $featuredproduct]);
     }
     public function updatefeaturedproductpost(Request $request){
        $Featuredproducts =  Featuredproductsdata::where('id','=',$request->id)->first();

        if($request->title != null){
            $request->validate([
                'title' => 'unique:featuredproducts'
            ]);
            $Featuredproducts->title = $request->title;
        }
            if($request->file('updatedimage')){
                $file_name = uniqid().'.'.$request->file('updatedimage')->extension();
                unlink(public_path('productimage/').$Featuredproducts->image);
                $request->file('updatedimage')->move(public_path('productimage/'),$file_name);
                $Featuredproducts->image = $file_name;
            }
            $Featuredproducts->update();
            return redirect('/featuredproduct')->with('msg','Product Updated succesfully !!');
     }
     public function deletefeaturedproduct($id){
        $featuredproduct = Featuredproductsdata::where('id','=',$id)->first();
        unlink(public_path('productimage/').$featuredproduct->image);
        $featuredproduct->delete();
        return redirect('/featuredproduct')->with('msg','Product deleted succesfully !!');
    }
    public function featuredproductinfo($id){
        $featuredproduct = Featuredproductsdata::where('id','=',$id)->first();
        return view('admin/featuredproductinfo',['data' => $featuredproduct]);
    }

}
