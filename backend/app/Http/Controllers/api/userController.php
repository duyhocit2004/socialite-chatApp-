<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;



class userController extends Controller
{
    public function getUser() {
        try {
            $user = User::query()->get();
            return response()->json([
                'success' => 200,
                'message' => 'get users',
                'users' => $user,
            ],200);
        } catch (\Throwable $th) {
            //throw $th;
        }
        
    }
    public function store(Request $request) {
        
        $data = User::create([
            'phone' => '0000000000',
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'titleProfile'=>$request->titleProfile,
            'follow'=>'0',
            'avatar'=>$request->file ?? " ",
            'avatarSubmain'=>'',
            'gender'=>$request->gender,
            'Relationship'=>'',
            'Two-factor-authentication'=>0,
            'status'=>$request->status,
            'role'=>$request->role,
        ]);
        return response()->json([
            'success' => 200,
            'message' => 'create success',
            'data' => $data  
        ]);
    }
    public function show(string $id) {
        
    }
    public function edit(string $id) {
        $user = User::query()->find($id);
        return response()->json([
            'success' => 200,
            'message' => 'Get data success',
            'data' => $user,
        ]);
    }
    public function update(Request $request, string $id) {
        
        $user = User::find($id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password ?? "",
            'titleProfile'=>$request->titleProfile,
            'follow'=>'',
            'avatar'=>$request->file,
            'avatarSubmain'=>'',
            'gender'=>$request->gender,
            'Relationship'=>'',
            'Two-factor-authentication'=>0,
            'status'=>$request->status,
            'role'=>$request->role,
        ]);
        return response()->json([
            'success' => 200,
            'message' => 'update success',
            'req' =>$request->all(),
        ]);
    }
    public function destroi(Request $request) {
        $user = User::query()->find($request->id);
        $user->delete();
        return response()->json([
            'success' => 200,
            'message' => 'delete success',
        ]);
    }
}