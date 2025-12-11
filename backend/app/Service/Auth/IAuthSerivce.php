<?php

namespace App\Service\Auth;

use Illuminate\Http\Request;

interface IAuthSerivce {
    public function login(Request $request);
    public function loginAdmin(Request $request);
    public function register(Request $request);
    public function logOut(Request $request);
     
}