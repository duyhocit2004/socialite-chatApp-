<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\authController;
use App\Http\Controllers\api\postController;
use App\Http\Controllers\api\userController;
use App\Http\Controllers\api\categoryController;

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



Route::get('/test', function () {
    return ['message' => 'API is working!'];
});
// get user
Route::get('/user', [userController::class, 'getUser']);
Route::post('/user/store', [userController::class, 'store']);
Route::post('/user/destroi', [userController::class, 'destroi']);
Route::get('/user/edit/{id}', [userController::class, 'edit']);
Route::put('/user/update/{id}', [userController::class, 'update']);

Route::get('getPost',[postController::class,'getAllPost']);
Route::post('/category/store',[categoryController::class, 'store']);
Route::get('test', function () {
    return response()->json("xin chào");
});