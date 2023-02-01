<?php
use App\Models\Admin_data;
use App\Models\catagories_data;
use App\Models\Products_data;

    function admindata($id){
        $userdetails = Admin_data::where('id',"=",$id)->first();
        return $userdetails;
    }
    function submenus($name){
        $subcatagories = catagories_data::where('type',"=",$name)->where('status',1)->get();
        return $subcatagories;
    }
    function product($name){
        $product = Products_data::where('category',"=",$name)->where('status',1)->get();
        return $product;
    }
?>
