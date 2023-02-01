<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Main page routes

Route::get('about',[MainController::class,'about'])->name('about');
Route::get('addtowishlist',[MainController::class,'addtowishlist'])->name('addtowishlist');
Route::get('cart',[MainController::class,'cart'])->name('cart');
Route::get('checkout',[MainController::class,'checkout'])->name('checkout');
Route::get('contact',[MainController::class,'contact'])->name('contact');
Route::get('index',[MainController::class,'index'])->name('index');
Route::get('men',[MainController::class,'men'])->name('men');
Route::get('ordercomplete',[MainController::class,'ordercomplete'])->name('ordercomplete');
Route::get('productdetails/{name}',[MainController::class,'productdetails'])->name('productdetails');
Route::get('women',[MainController::class,'women'])->name('women');
Route::get('defult/{name}',[MainController::class,'defult'])->name('defult');

//admin page routes
Route::get('admin',[AdminController::class,'login'])->name('admin');
Route::post('loginpost',[AdminController::class,'loginpost'])->name('loginpost');
Route::group(['middleware'=>'admin_auth'],function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('dashboard');    
    Route::get('/update',[AdminController::class,'adminupdate'])->name('update');    
    Route::post('/adminupdatepost',[AdminController::class,'adminupdatepost'])->name('adminupdatepost');  
    Route::get('/password',[AdminController::class,'adminpassword'])->name('password');   
    Route::post('/passwordpost',[AdminController::class,'adminpasswordpost'])->name('passwordpost');
    Route::get('/logout',[AdminController::class,'logout'])->name('logout');  
    Route::get('/catagories',[AdminController::class,'catagories'])->name('catagories');
    Route::get('/createcatagories',[AdminController::class,'createcatagories'])->name('createcatagories'); 
    Route::post('/createcatagoriespost',[AdminController::class,'createcatagoriespost'])->name('createcatagoriespost');  
    Route::get('/products',[AdminController::class,'products'])->name('products'); 
    Route::get('/createproducts',[AdminController::class,'createproducts'])->name('createproducts'); 
    Route::post('/createproductspost',[AdminController::class,'createproductspost'])->name('createproductspost'); 
    Route::get('/catagoriesget',[AdminController::class,'catagoriesget'])->name('catagoriesget'); 
    Route::get('/productstatus/{id}',[AdminController::class,'productstatus'])->name('productstatus'); 
    Route::get('/banner',[AdminController::class,'banner'])->name('banner'); 
    Route::get('/bannerstatus',[AdminController::class,'bannerstatus'])->name('bannerstatus'); 
    Route::get('/createbanner',[AdminController::class,'createbanner'])->name('createbanner'); 
    Route::post('/createbannerpost',[AdminController::class,'createbannerpost'])->name('createbannerpost'); 
    Route::get('/catagoriesstatus/{id}',[AdminController::class,'catagoriesstatus'])->name('catagoriesstatus'); 
});

Route::get('registerget',[AdminController::class,'registerget'])->name('registerget');
Route::post('adminregister',[AdminController::class,'adminregister'])->name('adminregister');


