<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\authController;
use GuzzleHttp\Middleware;

Route::post('login',[authController::class,'login']);
Route::post('register',[authController::class,'register']);
Route::post('loginAdmin',[authController::class,'loginAdmin']);
Route::post('logout',[authController::class,'logout']);
// Route::middleware()

Route::middleware('ClientAuth')->group(function (){
   Route::get('profile',[authController::class,'profile']);
});
Route::middleware('AdminAuth')->group(function (){
   
});


Route::get('test', function () {
    return response()->json("xin chào");
});