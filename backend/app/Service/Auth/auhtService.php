<?php

namespace App\Service\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\AuthRepositories;
class AuhtService implements IAuthSerivce {

    public $authRepositories;

    public function __construct(AuthRepositories $authRepositories )
    {
        $this->authRepositories = $authRepositories;
    }

    public function login(Request $request){

     

        $validator =validator($request->all(),[
            'email' => 'required|max:255',
            'passowrd' => 'requied|max:120'
        ]);
          
        if($validator->fails()){
            return response()->json([
                'error' => "lỗi". $validator->errors(),
                'message'=>"tài khoản hoặc mật khẩu không đúng "
            ]);
        }

        return $this->authRepositories->login($request);
        
    }
    public function loginAdmin(Request $request){
        $validator =validator($request->all(),[
            'email' => 'required|max:255',
            'passowrd' => 'requied|max:120'
        ]);

        if($validator->fails()){
            return response()->json([
                'error' => "lỗi". $validator->errors(),
                'message'=>"tài khoản hoặc mật khẩu không đúng "
            ]);
        }

        return $this->authRepositories->loginAdmin($request);
        
    }
    public function register(Request $request){
         $validator = validator($request->all(),[
            'name' => "required|regex:/^[\x{0000}-\x{FFFF}]*$/u|min:5|max:100",
            'phone'=>'required|digits:10',
            'email'=> "required|regex:/^[\x{0000}-\x{FFFF}]*$/u",
            'password'=>"required|regex:/^[\x{0000}-\x{FFFF}]*$/u|min:10|max:120"

        ]);

        if($validator->fails()){
            return response()->json([
            'status' => 422,
            'errors' => $validator->errors(),
            'message' => "Dữ liệu không hợp lệ"
            ],422);
        }

        $data = $request->only('email','phone');

        foreach($data as $field => $data1){
            
           if(User::where($field,$data1)->exists()){
            return response()->json([
                'status' => 409,
                'message' => $field ."đã tồn tại"
            ],409);
           }

            
        }

        return $this->authRepositories->register($request);
    }
    public function logOut(Request $request){
        return $this->authRepositories->logout($request);
    }
}