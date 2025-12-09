<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Symfony\Component\HttpFoundation\Response;

class JwtCustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,...$role): Response
    {
        try {
            $role = JWTAuth::parseToken()->authenticate();
           
        } catch (\Throwable $th) {
            return response()->json(['message' => "tài khoản không tồn tại",404]);
        }

         if($role !== config('data.admin')){
            return response()->json(['message' => "tài khoản không tồn tại",404]);
        }
        return $next($request);
    }
}
