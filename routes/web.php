<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mainController;
use App\Http\Controllers\bannerController;
use App\Http\Controllers\featuredproductController;
use App\Http\Controllers\SocialController;
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

//main page Routes

Route::get('/aboutus', [mainController::class,'aboutus'])->name('aboutus');
Route::get('/bedroom', [mainController::class,'bedroom'])->name('bedroom');
Route::get('/contact', [mainController::class,'contact'])->name('contact');
Route::get('/corporateoffice', [mainController::class,'corporateoffice'])->name('corporateoffice');
Route::get('/customerstories', [mainController::class,'customerstories'])->name('customerstories');
Route::get('/defult', [mainController::class,'defult'])->name('defult');
Route::get('/diningroom', [mainController::class,'diningroom'])->name('diningroom');
Route::get('/hotelrestaurant', [mainController::class,'hotelrestaurant'])->name('hotelrestaurant');
Route::get('/index', [mainController::class,'index'])->name('index');
Route::get('/tankyou', [mainController::class,'thankyou'])->name('thankyou');
Route::post('/enquiry', [mainController::class,'enquiry'])->name('enquiry');
Route::get('/kitchen', [mainController::class,'kitchen'])->name('kitchen');
Route::get('/livingroom', [mainController::class,'livingroom'])->name('livingroom');
Route::get('/showroominterior', [mainController::class,'showroominterior'])->name('showroominterior');
Route::get('/termsconditions', [mainController::class,'termsconditions'])->name('termsconditions');
Route::get('/defaultpage/{sulg}',[mainController::class,'defaultpage'])->name('defaultpage');
Route::post('/pagesimagepost/{sulg}',[mainController::class,'pagesimagepost'])->name('pagesimagepost');



// admin pannel routes

Route::get('/admin',[adminController::class,'login'])->name('login');
Route::post('/admin',[adminController::class,'loginpost'])->name('loginpost');
Route::get('/register',[adminController::class,'registerpage'])->name('registerget');
Route::post('/register',[adminController::class,'adminregister'])->name('registerpost');
Route::get('/alert',[adminController::class,'alert'])->name('alert');
Route::get('/badge',[adminController::class,'badge'])->name('badge');
Route::get('/button',[adminController::class,'button'])->name('button');
Route::get('/card',[adminController::class,'card'])->name('card');
Route::get('/chart',[adminController::class,'chart'])->name('chart');
Route::get('/fontawesome',[adminController::class,'fontawesome'])->name('fontawesome');
Route::get('/forgetpassword',[adminController::class,'forgetpassword'])->name('forgetpassword');
Route::get('/form',[adminController::class,'form'])->name('form');
Route::get('/grid',[adminController::class,'grid'])->name('grid');
Route::get('/inbox',[adminController::class,'inbox'])->name('inbox');
Route::get('/index2',[adminController::class,'index2'])->name('index2');
Route::get('/index3',[adminController::class,'index3'])->name('index3');
Route::get('/index4',[adminController::class,'index4'])->name('index4');
Route::get('/map',[adminController::class,'map'])->name('map');
Route::get('/modal',[adminController::class,'modal'])->name('modal');
Route::get('/progressbar',[adminController::class,'progress-bar'])->name('progressbar');
Route::get('/switch',[adminController::class,'switch'])->name('switch');
Route::get('/tab',[adminController::class,'tab'])->name('tab');
Route::get('/table',[adminController::class,'table'])->name('table');
Route::get('/typo',[adminController::class,'typo'])->name('typo');


Route::group(['middleware'=>'admin_auth'],function(){


Route::get('/dashboard',[adminController::class,'index'])->name('dashboard');
Route::get('/logout',[adminController::class,'logout'])->name('logout');
Route::get('/update',[adminController::class,'adminupdate'])->name('update');
Route::post('/update',[adminController::class,'adminupdatepost'])->name('updatepost');
Route::get('/password',[adminController::class,'adminpassword'])->name('password');
Route::post('/password',[adminController::class,'adminpasswordpost'])->name('passwordpost');
Route::get('/enquiryshow',[adminController::class,'enquiryshow'])->name('enquiryshow');
Route::get('/enquiryreply/{id}',[adminController::class,'enquiryreply'])->name('enquiryreply');
Route::post('enquiryreply',[adminController::class,'enquiryreplypost'])->name('enquiryreplypost');
Route::get('/enquiryreplydetails/{id}',[adminController::class,'enquiryreplydetails'])->name('enquiryreplydetails');
Route::post('/enquiryshowsearch',[adminController::class,'enquiryshowsearch'])->name('enquiryshowsearch');
Route::get('/enquiryshowsearch',[adminController::class,'enquiryshowsearchget'])->name('enquiryshowsearchget');
Route::get('/enquirydelete/{id}',[adminController::class,'enquirydelete'])->name('enquirydelete');
Route::get('/mainpages',[adminController::class,'mainpages'])->name('mainpages');
Route::get('/mainpageinfo/{id}',[adminController::class,'mainpageinfo'])->name('mainpageinfo');
// Route::get('/mainpagesedit/{id}',[adminController::class,'mainpages'])->name('mainpages');
// Route::get('/mainpageseditpost',[adminController::class,'mainpageseditpost'])->name('mainpageseditpost');
Route::get('/createpages',[adminController::class,'createpages'])->name('createpages');
Route::post('/createpagespost',[adminController::class,'createpagespost'])->name('createpagespost');
Route::get('/pageedit',[adminController::class,'pageedit'])->name('pageedit');
Route::post('/pageeditpost',[adminController::class,'pageeditpost'])->name('pageeditpost');
Route::get('/subpagessend',[adminController::class,'subpagessend'])->name('subpagessend');
Route::get('/subpagesdescription',[adminController::class,'subpagesdescription'])->name('subpagesdescription');
Route::get('/subpagessend',[adminController::class,'subpagessend'])->name('subpagessend');
Route::get('/subpages',[adminController::class,'subpages'])->name('subpages');
Route::get('/subpagesinfo/{id}',[adminController::class,'subpagesinfo'])->name('subpagesinfo');
Route::post('/subpageeditselectpost',[adminController::class,'subpageeditselectpost'])->name('subpageeditselectpost');
Route::get('/createsubpages',[adminController::class,'createsubpages'])->name('createsubpages');
Route::post('/createsubpagepost',[adminController::class,'createsubpagepost'])->name('createsubpagepost');
Route::get('/pagestatus/{id}',[adminController::class,'pagestatus'])->name('pagestatus');
Route::get('/subpagestatus/{id}',[adminController::class,'subpagestatus'])->name('subpagestatus');
Route::post('/pagedelete',[adminController::class,'pagedelete'])->name('pagedelete');
Route::post('/subpagedeletepost',[adminController::class,'subpagedeletepost'])->name('subpagedeletepost');
Route::post('/subpagedeletesub',[adminController::class,'subpagedeletesub'])->name('subpagedeletesub');

Route::get('users', [adminController::class, 'index'])->name('users.index');
Route::delete('users/{id}', [adminController::class, 'delete'])->name('users.delete');





Route::get('/createdescriptionpages',[adminController::class,'createdescriptionpages'])->name('createdescriptionpages');
Route::post('/createdescriptionpagespost',[adminController::class,'createdescriptionpagespost'])->name('createdescriptionpagespost');
Route::get('/pagesimages', [adminController::class,'pagesimages'])->name('pagesimages');
Route::get('/createpagesimage', [adminController::class,'createpagesimage'])->name('createpagesimage');
Route::post('/createpagesimagepost', [adminController::class,'createpagesimagepost'])->name('createpagesimagepost');
Route::get('/showpageimage/{id}', [adminController::class,'showpageimage'])->name('showpageimage');
Route::get('/deletepagesimage', [adminController::class,'deletepagesimage'])->name('deletepagesimage');
Route::get('/deletepagesimageget/{id}', [adminController::class,'deletepagesimageget'])->name('deletepagesimageget');
Route::get('/pagestrash', [adminController::class,'pagestrash'])->name('pagestrash');
Route::get('/pagestrashrestore/{id}', [adminController::class,'pagestrashrestore'])->name('pagestrashrestore');
Route::get('/subpagestrash', [adminController::class,'subpagestrash'])->name('subpagestrash');
Route::get('/subpagestrashrestore/{id}', [adminController::class,'subpagestrashrestore'])->name('subpagestrashrestore');
Route::get('/communications', [adminController::class,'communications'])->name('communications');

//banner Resource

Route::get('/banner',[bannerController::class,'bannerdetails'])->name('banner');
Route::get('/bannercreate',[bannerController::class,'createbanner'])->name('createbanner');
Route::post('/bannercreate',[bannerController::class,'createbannerpost'])->name('createbannerpost');
Route::get('/changeStatus/{id}',[bannerController::class,'changeStatus'])->name('changeStatus');
Route::get('/bannerinfo/{id}',[bannerController::class,'bannerinfo'])->name('bannerinfo');
Route::get('/deletebanner/{id}',[bannerController::class,'deletebanner'])->name('deletebanner');
Route::get('/editbanner/{id}',[bannerController::class,'editbanner'])->name('editbanner');
Route::post('/editbanner',[bannerController::class,'editbannerpost'])->name('editbannerpost');

//FeaturePage Resource

Route::get('/featuredproduct',[featuredproductController::class,'featuredproduct'])->name('featuredproduct');
Route::get('/createfeaturedproduct',[featuredproductController::class,'createfeaturedproduct'])->name('createfeaturedproduct');
Route::post('/createfeaturedproductpost',[featuredproductController::class,'createfeaturedproductpost'])->name('createfeaturedproductpost');
Route::get('/productchangeStatus/{id}',[featuredproductController::class,'productchangeStatus'])->name('productchangeStatus');
Route::get('/updatefeaturedproduct/{id}',[featuredproductController::class,'updatefeaturedproduct'])->name('updatefeaturedproduct');
Route::post('/updatefeaturedproductpost',[featuredproductController::class,'updatefeaturedproductpost'])->name('updatefeaturedproductpost');
Route::get('/deletefeaturedproduct/{id}',[featuredproductController::class,'deletefeaturedproduct'])->name('deletefeaturedproduct');
Route::get('/featuredproductinfo/{id}',[featuredproductController::class,'featuredproductinfo'])->name('featuredproductinfo');

  
    


});
//social Login
Route::get('/auth/callback',[SocialController::class,'gitcallback'])->name('gitcallback');
Route::get('/auth/redirect',[SocialController::class,'gitredirect'])->name('gitredirect');
Route::get('/auth/google/callback',[SocialController::class,'googlecallback'])->name('googlecallback');
Route::get('/auth/google/redirect',[SocialController::class,'googleredirect'])->name('googleredirect');


//api routes for external use

Route::get('reset-password',[ApiController::class,'resetpassword'])->name('reset-password');
Route::post('reset-passwordpost',[ApiController::class,'resetpasswordpost'])->name('reset-passwordpost');



