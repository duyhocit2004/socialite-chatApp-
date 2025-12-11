<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class checkRoleLoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();

        if(!$token){
            return response()->json([
                'status' => false,
                'message'=>"thiếu token"
            ],401);
        }

        $user = PersonalAccessToken::findToken($token)?->tokenable;

        if(!$user){
            return response()->json([
                'status' => false,
                'message'=>"Token không hợp lệ hoặc user không tồn tại"
            ],401);
        }
        
        if($user->role === "admin"){
            return response()->json([
                'status' => false,
                'message' => "Bạn không có quyền truy cập (chỉ admin được phép)"
            ], 403);
        }
        return $next($request);
    }
}
