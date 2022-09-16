<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin_data;
use App\Models\Bannertable;
use App\Models\enquiry;
use App\Models\Enquirytable;
use App\Models\Pages;
use App\Models\Pagesdata;
use App\Mail\EnquiryMailReply;
use App\Models\Featuredproductsdata;
use App\Models\Pagesimages;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Pagesimagesdata;
use App\Models\Subpage;
use App\Models\Subpagedata;
use League\CommonMark\Extension\DescriptionList\Node\DescriptionList;
use App\Models\CommunicationData;
use App\Models\Communication;
use softDeletes;


class adminController extends Controller
{
    //
    public function login(){

        return view('admin/login');
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

    public function registerpage(){
        return view('admin/register');
    }

    public function adminregister(Request $request){
        $data = new Admin();
        $request->validate([
            'username'=>'required|unique:admins',
            'email' => 'required|email|unique:admins',
            'password' => 'required'
        ]);

        $data->username = $request->username;
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

        if($request->username != null){
            $data->username = $request->username;
            $request->validate([
                'username' => 'unique:admins',
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
    public function enquiryshow(){
        $data = Enquirytable::all();
        return view('admin/showenquiries',['data' => $data]);

    }

    public function enquiryreply($id){
        $data = Enquirytable::where('id',"=",$id)->first();
        return view('admin/enquiryreply',['data' => $data]);
    }

    public function enquiryreplypost(Request $request){
        $request->validate([
            'reply' => 'required'
        ]);


        $data =
        [
            'name' => $request->name,
            'reply' => $request->reply,
        ];
        Mail::to($request->email)->send(new EnquiryMailReply($data));

        $tabledata = Enquirytable::where('id',"=",$request->id)->first();
        $tabledata->status = 0;
        $tabledata->reply = $request->reply;
        $tabledata->update();
        return redirect('/enquiryshow')->with('msg','Replyed Successfully !!');


    }
    public function enquiryreplydetails($id){
        $data = Enquirytable::where('id',"=",$id)->first();
        return view('admin/enquiryreplydetails',['data' => $data]);
    }
    public function enquiryshowsearchget(){
        return redirect('/enquiryshow');
    }


    public function enquiryshowsearch(Request $request){


        if($request->todate != "" && $request->fromdate != "" ){
            $request->validate([
                'fromdate' => 'required|date',
                'todate' => 'required|date|after:fromdate',
            ]);
            if($request->todate == $request->fromdate){
                $data = Enquirytable::where('status','=',$request->status)
                ->whereBetween('created_at',[$request->fromdate,Carbon::parse($request->fromdate)->endOfDay()])->get();

            }else{
                $data = Enquirytable::where('status','=',$request->status)->
                whereBetween('created_at',[$request->fromdate,Carbon::parse($request->todate)->endOfDay()])->get();
            }
        }
        else{
            if($request->status!= ""){

                $data = Enquirytable::where('status','=',$request->status)->get();
            }else{
                $data = Enquirytable::all();
            }
        }

        return view('admin/showenquiries',['data' => $data]);

    }
    public function enquirydelete($id){
        $tabledata = Enquirytable::where('id',"=",$id)->first();
        $tabledata->delete();
        return back()->with('msg','Enquiry deleted successfully !!');

    }

      public function alert() {
        return view('admin/alert');
    }
    public function badge(){
        return view('admin/badge');
    }
    public function button(){
        return view('admin/button');
    }
    public function card(){
        return view('admin/card');
    }
    public function chart(){
        return view('admin/chart');
    }
    public function fontawesome(){
        return view('admin/fontawesome');
    }
    public function forgetpassword(){
        return view('admin/forget-pass');
    }
    public function form(){
        return view('admin/form');
    }
    public function gride(){
        return view('admin/gride');
    }

    public function index(){
        $bannercount = Bannertable::where('status','=',1)->count();
        $product = Featuredproductsdata::where('status','=',1)->count();
        $enquiry = Enquirytable::where('status','=',1)->count();
        $page = Pagesdata::all()->count();
        return view('admin/index',['banner'=>$bannercount,'product'=>$product,'enquiry' =>$enquiry,'pages'=>$page]);


    }
    public function pagesimages(){
        $Pagesimagesdata = Pagesimagesdata::all();
        return view('admin/pageimage',['data'=>$Pagesimagesdata]);
    }
    public function createpagesimage(){
        $pagedata = Pages::all();
        $subpages = Subpagedata::all();
        return view('admin/createpageimage',['data'=>$pagedata,'subpage'=>$subpages]);
    }
    public function createpagesimagepost(Request $request){
        $Pagesimages = new Pagesimages();
        //add image statement
        if(Pagesimages::where('pagename','=',$request->pagename)->first()){
            if($request->hasfile('image'))
            {
                $Pagesimagesdata = Pagesimages::where('pagename','=',$request->pagename)->first();
                foreach ($request->file('image') as  $value) {
                    $file_type =$value->extension();
                    $filename = uniqid().".".$file_type;
                    $value->move(public_path('pagesimage/'),$filename);
                    $pagesimage[] = $filename;
                    $oldimage = explode(',',$Pagesimagesdata->image);
                }
                $Pagesimagesdata->image = implode(',',array_merge($oldimage,$pagesimage));

            }
                $Pagesimagesdata->update();
        }else{
            $Pagesimages->pagename = $request->pagename;
            if($request->hasfile('image'))
            {
                foreach ($request->file('image') as  $value) {
                    $file_type =$value->extension();
                    $filename = uniqid().".".$file_type;
                    $value->move(public_path('pagesimage/'),$filename);
                    $pagesimage[] = $filename;
                }
                $Pagesimages->image = implode(',',$pagesimage);

            }
            $Pagesimages->save();
        }

        return back();
    }
    public function showpageimage($id){
        $Pagesimagesdata = Pagesimagesdata::where('pagename','=',$id)->first();
        return view('admin/showpageimage',['data'=>$Pagesimagesdata]);
    }
    public function deletepagesimage(){
        $Pagesimages = Pagesimagesdata::all();
        return view('admin/deletepagesimage',['image'=>$Pagesimages]);
    }
    public function deletepagesimageget($id){
        $Pagesimagesdata = Pagesimages::where('pagename','=',$id)->first();
        $filearray =  explode(',',$Pagesimagesdata->image);
        foreach ($filearray as $value) {
           unlink(public_path('pagesimage/'.$value));
        }
        $Pagesimagesdata->delete();
        return back()->with('msg','Image deleted succesfully!!');
    }

    public function createsubpages(){
        $pagedata = Pages::all();
        return view('admin/createsubpages',['data'=>$pagedata]);
    }

    public function createsubpagepost(Request $request){
        $request->validate([
            'subpage' =>'unique:pages,name',
            'subpage' => 'unique:subpages,name'
        ]);

        $mainpage = pagesdata::where('id','=',$request->pageid)->first();
        $mainpage->submenus = 1;


        $subpage = new Subpage();
        $subpage->mainpage = $mainpage->id;
        $subpage->name = $request->subpage;
        $subpage->description = $request->description;
        $slug = str::slug(uniqid());
        $subpage->slug =  $slug;
        $subpage->status =  1;
        $subpage->save();
        $mainpage->update();


        if($request->hasfile('image'))
            {

                $pagesimages = new pagesimages;
                foreach ($request->file('image') as  $value) {
                    $file_type =$value->extension();
                    $filename = uniqid().".".$file_type;
                    $value->move(public_path('pagesimage/'),$filename);
                    $pagesimage[] = $filename;
                }
                $pagesimages->image = implode(',',$pagesimage);
                $pagesimages->pagename = $slug;
                $pagesimages->save();
            }

            return redirect('subpages')->with('msg','Subpage added Successfuly!!');
    }

    public function pagestatus($id){
        $getStatus = Pagesdata::select('status')->where('id','=',$id)->first();
 
        if( $getStatus->status== 1){
             $status = 0;
        }else{
             $status = 1;
        }
        $getStatus::where('id',"=",$id)->update(['status' => $status]);
        return redirect()->back();
    }
    public function subpagestatus($id){
        $getStatus = Subpagedata::where('id','=',$id)->first();
        if( $getStatus->status== 1){
             $status = 0;
        }else{
             $status = 1;
        }
        $getStatus::where('id',"=",$id)->update(['status' => $status]);

        $getcount = Subpagedata::where('mainpage','=',$getStatus->mainpage)
        ->where('status',1)
        ->count();

        if($getcount == 0){
            $mainpage = Pagesdata::where('id',$getStatus->mainpage)->first();
            $mainpage->submenus = 0;
            $mainpage->update();
        }else{
            $mainpage = Pagesdata::where('id',$getStatus->mainpage)->first();
            $mainpage->submenus = 1;
            $mainpage->update();
        }

        return redirect()->back();
    }

    public function modal(){
        return view('admin/modal');
    }
    public function progressbar(){
        return view('admin/progress-bar');
    }
    public function register(){
        return view('admin/register');
    }
    public function pageedit(){
            $mainpage = Pagesdata::all();
            $subpage = Subpagedata::all();

            return view('admin/pageedit',['mainpage' => $mainpage,'subpage' => $subpage]);
    }
    public function subpagessend(Request $request)
    {
        $subpagedata = Subpagedata::where('mainpage', $request->mainpage)->get();
        $mainpage = Pagesdata::where('id', $request->mainpage)->first();
        if(Pagesimagesdata::where('pagename',$mainpage->slug)->first()){
            $pageimage = Pagesimagesdata::where('pagename',$mainpage->slug)->first();
            $images = explode(',',$pageimage->image);
        }else{
            $images = null;
        }
        return response()->json(['subpagedata' => $subpagedata,'mainpage'=>$mainpage,'image'=>$images]);
    }
    public function pageeditpost(Request $request){
        $request->validate([
            'mainpagename'=>'unique:pages,name|unique:subpages,name',
            'subpagename'=>'unique:pages,name|unique:subpages,name'
           ]);
           $mainpagedata = Pagesdata::where('id',$request->mainpage)->first();
            $pagesimages = Pagesimagesdata::where('pagename',$mainpagedata->slug)->first();

            if($request->subpage != ""){
                if(Subpagedata::where('id', $request->subpage)->first()){
                    $subpagedata = Subpagedata::where('id', $request->subpage)->first();
                    $mainpagedata = Pagesdata::where('id',$request->mainpage)->first();

                    if($request->subpagename != null){
                        $subpagedata->name = $request->subpagename;
                    }
                    if($request->description != null){
                        $subpagedata->description = $request->description;
                    }
                    if($request->mainpagename != null){
                        $mainpagedata->name = $request->mainpagename;
                    }
                    if($request->imagekey != null){
                    if($request->hasfile('updateimage'))
                    {
                    $pagesimages = Pagesimagesdata::where('pagename',$subpagedata->slug)->first();
                    foreach ($request->file('updateimage') as  $value) {
                        $file_type =$value->extension();
                        $filename = uniqid().".".$file_type;
                        $value->move(public_path('pagesimage/'),$filename);
                        $pagesimage[] = $filename;
                    }
                    $mainarray = explode(',',$pagesimages->image);

                    if(sizeof($pagesimage) < sizeof($request->imagekey)){
                            
                            for ($i=0; $i < sizeof($pagesimage); $i++) { 
                                $t[] = $request->imagekey[$i];
                            }
                            foreach ($t as $key1 => $value1) {
                                $deleteimage[] = $mainarray[$value1];
                            }
                        }else{
                            foreach($request->imagekey as $i){
                                $deleteimage[] = $mainarray[$i];
                            }
                        }

                    $nondeleted =  array_diff(explode(',',$pagesimages->image),$deleteimage);
                    $pagesimages->image = implode(',',$nondeleted).','.implode(',',$pagesimage);
                    $pagesimages->update();
                }
            }else{
                $pagesimages = Pagesimagesdata::where('pagename',$subpagedata->slug)->first();
                foreach ($request->file('updateimage') as  $value) {
                    $file_type =$value->extension();
                    $filename = uniqid().".".$file_type;
                    $value->move(public_path('pagesimage/'),$filename);
                    $pagesimage[] = $filename;
                }
                $pagesimages->image = $pagesimages->image.','.implode(',',$pagesimage);
                $pagesimages->update();
            }
                }
                $subpagedata->update();
                $mainpagedata->update();
                return redirect('subpages')->with('msg','Page updated sucessfully !!');
            
        }else{
                $mainpagedata = Pagesdata::where('id',$request->mainpage)->first();
                if($request->mainpagename != null){
                    $mainpagedata->name = $request->mainpagename;
                }
                if($request->description != null){
                    $mainpagedata->description = $request->description;
                }
                if($request->imagekey != null){
                        if($request->hasfile('updateimage'))
                        {
                            $pagesimages = Pagesimagesdata::where('pagename',$mainpagedata->slug)->first();
                            foreach ($request->file('updateimage') as  $value) {
                                $file_type =$value->extension();
                                $filename = uniqid().".".$file_type;
                                $value->move(public_path('pagesimage/'),$filename);
                                $pagesimage[] = $filename;
                            }
                            $mainarray = explode(',',$pagesimages->image);

                            if(sizeof($pagesimage) < sizeof($request->imagekey)){
                                    
                                    for ($i=0; $i < sizeof($pagesimage); $i++) { 
                                        $t[] = $request->imagekey[$i];
                                    }
                                    foreach ($t as $key1 => $value1) {
                                        $deleteimage[] = $mainarray[$value1];
                                    }
                                }else{
                                    foreach($request->imagekey as $i){
                                        $deleteimage[] = $mainarray[$i];
                                    }
                                }

                            $nondeleted =  array_diff(explode(',',$pagesimages->image),$deleteimage);
                            $pagesimages->image = implode(',',$nondeleted).','.implode(',',$pagesimage);
                            $pagesimages->update();
                        }
                }else{
                        $pagesimages = Pagesimagesdata::where('pagename',$mainpagedata->slug)->first();
                    foreach ($request->file('updateimage') as  $value) {
                        $file_type =$value->extension();
                        $filename = uniqid().".".$file_type;
                        $value->move(public_path('pagesimage/'),$filename);
                        $pagesimage[] = $filename;
                    }
                    $pagesimages->image = $pagesimages->image.','.implode(',',$pagesimage);
                    $pagesimages->update();
                }

            $mainpagedata->update();
            return redirect('mainpages')->with('msg','Page updated sucessfully !!');

            }
        }
    public function communications(){
       $communication =  CommunicationData::with('admindata','userdata')->get();
       return view('admin.communication',['communication'=>$communication]);
    }

    public function mainpages(){
        $mainpagedata = Pagesdata::all();
        $subpagedata = Subpagedata::all();
        return view('admin/pages',['mainpage'=>$mainpagedata,'subpage'=>$subpagedata]);
    }
    public function mainpageinfo($id){
        $mainpagedata = Pagesdata::where('id',$id)->first();
        $subpagedata = Subpagedata::where('mainpage',$id)->get();
        $image = Pagesimagesdata::where('pagename',$mainpagedata->slug)->first();
        return view('admin/mainpageinfo',['mainpage'=>$mainpagedata,'subpage'=>$subpagedata,'image'=>$image]);
    }

    // public function mainpagesedit($id){
    //     $mainpagedata = Pagesdata::where('id',$id)->first();
    //     return view('admin/mainpagesedit',$mainpagedata);
    // }

    // public function mainpageseditpost(Request $request){
    //     $request->validate([
    //         'pagename'=>"unique:pages,name",
    //         'pagename'=>"unique:subpages,name",
    //     ]);
    //     $mainpagedata = Pagesdata::where('id',$id)->first();



    // }


    public function subpagesdescription(Request $request){
        $subpagesdescription = Subpagedata::where('id', $request->subpage_id)->first();
        if($pagesimages = Pagesimagesdata::where('pagename',$subpagesdescription->slug)->first()){
            $pagesimages = Pagesimagesdata::where('pagename',$subpagesdescription->slug)->first();
            $images = explode(',',$pagesimages->image);
        }else{
            $images = null;
        }
        return response()->json(['subpagesdescription'=>$subpagesdescription,'image'=>$images]);
    }

    public function subpages(){
        $subpagedata = Subpagedata::withoutTrashed()->get();
        // echo $subpagedata;
        // die;
        
        return view('admin/subpages',['subpage'=>$subpagedata]);
    }

    public function subpagesinfo($id){
        $subpagesdata = Subpagedata::where('id', $id)->first();
        if($pagesimages = Pagesimagesdata::where('pagename',$subpagesdata->slug)->first()){
            $pagesimages = Pagesimagesdata::where('pagename',$subpagesdata->slug)->first();
            $images = explode(',',$pagesimages->image);
        }else{
            $images = null;
            return view('admin/subpagesinfo',['subpage'=>$subpagesdata,'image'=>$images]);
        }
        return view('admin/subpagesinfo',['subpage'=>$subpagesdata,'image'=>$images]);
    }


    public function subpageeditpost(Request $request){

    //    $request->validate([
    //     'page'=>'unique:pages,name|unique:subpages,name',
    //     'subpage'=>'unique:pages,name|unique:subpages,name',
    //    ]);

       $subpage = Subpagedata::where('id','=',$request->subid)->first();
    //    $pageimage = Pagesimagesdata::where('pagename','=',$subpage->slug)->first();
       $page = Pagesdata::where('id','=',$request->pageid)->first();

       $subpage->name = $request->subpage;
       $page->name = $request->page;
       $subpage->description = $request->description;
       $subpage->update();
       $page->update();
       return redirect('showpages')->with('msg','Updated sucessfully !!');
    }

    public function subpageeditselectpost(Request $request){
        $page = Pagesdata::where('name','=',$request->page)->first();
        $subpage = Subpagedata::where('slug','=',$request->subpage)->first();
        $pageimage = Pagesimagesdata::where('pagename','=',$subpage->slug)->first();
        return view('admin/subpageedit',['subpage'=>$subpage,'pageimage'=>$pageimage,'page'=>$page]);
    }

    public function createpages(){
        return view('admin/createpage');
    }
    public function createpagespost(Request $request){
        $request->validate([
            'pagename' => 'unique:pages,name|unique:subpages,name',
        ]);
        $table = new Pages();
        $table->name = $request->pagename;
        $slug = str::slug(uniqid());
        $table->slug = $slug;
        $table->submenus = 0;
        $table->status = 1;
        $table->description = $request->description;
        if($request->hasfile('image'))
            {
                $pagesimages = new pagesimages;
                foreach ($request->file('image') as  $value) {
                    $file_type =$value->extension();
                    $filename = uniqid().".".$file_type;
                    $value->move(public_path('pagesimage/'),$filename);
                    $pagesimage[] = $filename;
                }
                $pagesimages->image = implode(',',$pagesimage);
                $pagesimages->pagename = $slug;
                $pagesimages->save();
            }
            $table->save();
        return redirect('mainpages')->with('msg','Page added Successfuly!!');
    }




    public function showpagedata($slug){

        if(Pagesdata::where('slug','=',$slug)->first()){
            $table = Pagesdata::where('slug','=',$slug)->first();
        }else{
            $table = Subpagedata::where('slug','=',$slug)->first();
        }
         return view('admin/showdescription',['data'=>$table]);


        $table = Pagesdata::where('slug','=',$slug)->first();
        return view('admin/showdescription',['data'=>$table]);

    }

    public function pagedelete(Request $request){
        $id = $request->id;

        // if(Subpagedata::where('mainpage','=',$id)->first()){
        //     $subpage = Subpagedata::where('mainpage','=',$id)->get();
        //     $page = Pagesdata::where('id','=',$id)->first();
        //     return view('admin/subpagedelete',['page'=>$page,'subpage'=>$subpage]);
        // }
        $page = Pagesdata::where('id','=',$id)->first();
        if(Pagesimagesdata::where('pagename','=',$page->slug)->first()){
            $pageimage = Pagesimagesdata::where('pagename','=',$page->slug)->first();

            // foreach(explode(',',$pageimage->image) as $item){
            //     unlink(public_path('pagesimage/').$item);
            // }
            $pageimage->delete();
        }
        $page->delete();
        return redirect('mainpages')->with('msg','Page move to the trash!!');

    }

    public function subpagedeletepost(Request $request){

        $subpagecount = Subpagedata::where('mainpage','=',$request->page)->count();
        $subpage = Subpagedata::where('mainpage','=',$request->page)->first();
        $page = Pagesdata::where('id','=',$request->page)->first();

        if($subpagecount == 1){
            $page->submenus = 0;
            $page->update();
        }

        if(Pagesimagesdata::where('pagename','=',$subpage->slug)->first()){

            $pageimage = Pagesimagesdata::where('pagename','=',$subpage->slug)->first();
            // foreach(explode(',',$pageimage->image) as $item){
            //     unlink(public_path('pagesimage/').$item);
            // }
            $pageimage->delete();
        }
        $subpage->delete();
        return redirect('subpages')->with('msg',' Page move to the trash!!');
    }
    public function subpagedeletesub(Request $request){
        $id = $request->id;
        $subpage = Subpagedata::find($id);
        $subpagecount = Subpagedata::where('mainpage','=',$subpage->mainpage)->count();
        $page = Pagesdata::where('id','=',$subpage->mainpage)->first();
        if($subpagecount == 1){
            $page->submenus = 0;
            $page->update();
        }
        if(Pagesimagesdata::withTrashed()->where('pagename','=',$subpage->slug)->first()){

            $pageimage = Pagesimagesdata::withTrashed()->where('pagename','=',$subpage->slug)->first();

            // foreach(explode(',',$pageimage->image) as $item){
            //     unlink(public_path('pagesimage/').$item);
            // }

            $pageimage->delete();
        }
        $subpage->delete();
        return redirect('subpages')->with('msg',' Page move to the trash!!');
    }
    public function pagestrash(){
        $page = Pagesdata::onlyTrashed()->get();
        return view('admin/mainpagetrash',['page'=>$page]);
    }
    public function pagestrashrestore($id){
        $page = Pagesdata::withTrashed()->find($id);
        $page->restore();
        return redirect('mainpages')->with('msg',' Page restore successfully !!');
    }
    public function subpagestrash(){
        $page = Subpagedata::onlyTrashed()->get();
        $mainpage = Pagesdata::withoutTrashed()->get();
        
        return view('admin/subpagestrash',['page'=>$page,'mainpage'=>$mainpage]);
    }
    public function subpagestrashrestore($id){

        $page = Subpagedata::withTrashed()->find($id);
        $pageimage = Pagesimagesdata::withTrashed()->where('pagename',$page->slug)->first();
        $page->restore();
        $pageimage->restore();

        $subpagecount = Subpagedata::withTrashed()->where('mainpage','=',$id)->count();
        $mainpage = Pagesdata::where('id','=',$page->mainpage)->first();

        if($subpagecount == 0){
            $mainpage->submenus = 1;
            $mainpage->update();
        }
        return redirect('subpages')->with('msg',' Page restore successfully !!');
    }

    public function logout(){
        session()->forget('ADMIN_ID');
        session()->forget('ADMIN_LOGIN');
        return redirect('/admin');
    }

}
