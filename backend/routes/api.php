<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\authController;

Route::middleware('auth:api')->group(function (){
    Route::post('login',[authController::class,'login']);
});



Route::get('/test', function () {
    return ['message' => 'API is working!'];
});