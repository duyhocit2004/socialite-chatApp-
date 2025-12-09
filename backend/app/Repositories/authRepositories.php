<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class AuthRepositories {
  public function login(Request $request){
        try {
            $data = $request->only('email','password');
  
            $user = User::where('email',$data['email'])->first();
            if(!$user || Hash::check($data['password'],$user->password)){
                return response()->json([
                    'message' => "đăng nhập không thành công",
                    'status'=>404,
                    'data' => ''
                ]);
            }

            if(PersonalAccessToken::where('tokenable_id' ,$user->id)){
                $user->tokens()->where('tokenable_id',$user->id)->delete();
            }
            
            $token = $user->createToken('token')->plainTextToken;
            
            return response()->json([
                'notification' =>[
                    'message' =>"đăng nhập thành công",
                    'status' => 200,
                    'data' => ''
                ],
                'token' =>[
                    'codeToken' => $token,
                    'Bearer ' => 'Bearer'
                ]
                ]);
            
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "lỗi"+$th
            ],404);
        }
    }
    public function loginAdmin(Request $request){
         try {

            $data = $request->only('email','password');

            $user = User::where('email',$data['email'])->first();
            if(!$user || !Hash::check($request->email,$request->password)){
                return response()->json([
                    'message' => "đăng nhập không thành công",
                    'status'=>404,
                    'data' => ''
                ]);
            }

            $token = $user->createToken('token')->plainTextToken;
            
            return response()->json([
                'notification' =>[
                    'message' =>"đăng nhập thành công",
                    'status' => 200,
                    'data' => ''
                ],
                'token' =>[
                    'codeToken' => $token,
                    'Bearer ' => 'Bearer'
                ]
                ]);
            
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "lỗi"+$th
            ],404);
        }
    }
    public function register(Request $request){
      try {
        $user = User::create([
            'email' => $request->email,
            'phone' => $request->phone,
            'name' =>$request->name,
            'password'=>$request->password,
            'avatar' => "",
            'gender' => 'woman',
            'Relationship' => 'alone',
            'status' => 'active',
            'role' => $request->role ?? 'user',
            'follow'=>0
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Đăng ký thành công',
            'user' => $user
        ], 201);

      } catch (\Throwable $th) {
        return response()->json([
            'status' => false,
            'message' => 'Lỗi hệ thống',
            'error' => $th->getMessage()
        ], 500);
      }
    }
    public function logOut(Request $request){
        try {
            $token = PersonalAccessToken::findToken($request->bearerToken());

            $token->delete();

            return response()->json([
            'status'=>true,
            'message'=>"đăng xuất thành công",
            
            ],200);
        } catch (\Throwable $th) {
            return response()->json([
            'status'=>false,
            'message'=>"lỗi".$th->getmessage(),
            
            ],201);
        }
    }
}