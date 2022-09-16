<?php
use App\Models\Admin_data;
use App\Models\Pagesdata;



function admindata($id){
    $userdetails = Admin_data::where('id',"=",$id)->first();
    return $userdetails;
};

function mainpagedata($id){
    if(Pagesdata::withoutTrashed()->find($id)){
        $pagedata = Pagesdata::withoutTrashed()->find($id);
        return $pagedata->name;
    }
};


?>