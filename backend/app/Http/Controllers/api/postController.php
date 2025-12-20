<?php

namespace App\Http\Controllers\api;

use App\Models\post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\User\Posts\PostService;
class postController extends Controller
{
    public $postService;
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function getAllPost(Request $request)
    {
        return $this->postService->getAllPost($request);
    }

}
