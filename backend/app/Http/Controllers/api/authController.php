<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class authController extends Controller
{
    public function Login (Request $request){

        
        return response()->json([
            "data" => $request->all(),
            "message" => "đẩy dữ liệu thành công",
            'status' => 200
        ]);
    }

    public function resgister(Request $request){
        
    }

    public function logout(Request $request){

    }
}
