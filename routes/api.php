<?php

use App\Http\Controllers\adminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('usershow',[ApiController::class,'usershow'])->name('usershow');
Route::post('userregistration',[ApiController::class,'userregistration'])->name('userregistration');
Route::post('upadateuserdetails',[ApiController::class,'upadateuserdetails'])->name('upadateuserdetails');
Route::get('deleteuser/{email}',[ApiController::class,'deleteuser'])->name('deleteuser');
Route::get('finduser/{email}',[ApiController::class,'finduser'])->name('finduser');


