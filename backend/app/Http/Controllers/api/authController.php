<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Tymon\JWTAuth\JWT;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Service\Auth\AuhtService;
class authController extends Controller
{

    public $authService;

    public function __construct(AuhtService  $auhtService ){
        $this->authService = $auhtService;
    }
    

    public function login (Request $request){

       return  $this->authService->login($request);
    }

    public function loginAdmin(Request $request){
        return  $this->authService->loginAdmin($request);
    }
    public function register(Request $request){
      return $this->authService->register($request);
    }

    public function logout(Request $request){
        return $this->authService->logout($request);
    }

    public function profile(Request $request){
         return response()->json([
        'status' => 200,
        'user' => $request->user() ?? auth()->user()  // hoặc auth()->user()
    ]);
    }
}
