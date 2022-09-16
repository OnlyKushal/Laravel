<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use App\Models\Bannertable;
use Illuminate\Http\Request;

class bannerController extends Controller
{
    //
    public function bannerdetails(){
        $banner =  Bannertable::all();
        return view('admin/showbanner',['data' => $banner]);
    }

    public function createbanner(){
        return view('admin/createbanner');
    }
    public function createbannerpost(Request $request){
        $data = new Banner;
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
            $request->file('image')->move(public_path('bannerimages/'),$file_name);
            $data->image = $file_name;
        }

        $data->save();
        return redirect('/banner')->with('msg','Banner created succesfull !!');

    }
    public function bannerinfo($id){
        $banner =  Bannertable::where('id','=',$id)->first();
        return view('admin/bannerinfo',['data' => $banner]);
    }
    public function deletebanner($id){
        $banner =  Bannertable::where('id','=',$id)->first();
        unlink(public_path('bannerimages/').$banner->image);
        $banner->delete();
        return redirect('/banner')->with('msg','Banner deleted succesfully !!');
    }
    public function editbanner($id){
        $banner =  Bannertable::where('id','=',$id)->first();
        return view('admin/banneredit',['data' => $banner]);
    }
    public function editbannerpost(Request $request){
        $banner =  Bannertable::where('id','=',$request->id)->first();
        if($request->title != null){
            $request->validate([
                'title' => 'unique:banners'
            ]);
            $banner->title = $request->title;
        }
            if($request->file('updatedimage')){
                $file_name = uniqid().'.'.$request->file('updatedimage')->extension();
                unlink(public_path('bannerimages/').$banner->image);
                $request->file('updatedimage')->move(public_path('bannerimages/'),$file_name);
                $banner->image = $file_name;
            }
            $banner->update();
            return redirect('/banner')->with('msg','Banner Updated succesfully !!');
    }
    public function changeStatus($id){
        $getStatus = Bannertable::select('status')->where('id','=',$id)->first();
 
        if( $getStatus->status== 1){
             $status = 0;
        }else{
             $status = 1;
        }
        
        $getStatus::where('id',"=",$id)->update(['status' => $status]);
 
        return redirect()->back();
       
 
     }

}
