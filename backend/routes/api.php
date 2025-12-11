<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\authController;
use App\Http\Controllers\api\categoryController;
use App\Http\Controllers\api\userController;

Route::middleware('auth:api')->group(function (){
    Route::post('login',[authController::class,'login']);
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

Route::post('/category/store',[categoryController::class, 'store']);