<?php 
namespace App\Service\User\Posts;

use Illuminate\Http\Request;

interface IPostService {
    public function getAllPost(Request $request);
}