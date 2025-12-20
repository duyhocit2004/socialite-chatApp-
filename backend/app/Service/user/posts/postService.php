<?php 

namespace App\Service\User\Posts;

use App\Repositories\PostsRepositories;
use Illuminate\Http\Request;
class PostService implements IPostService{
    public $postRepositories;
    public function __construct(PostsRepositories $postRepositories)
    {
        $this->postRepositories = $postRepositories;
    }
    public function getAllPost(Request $request){
        return $this->postRepositories->getAllPost($request);
    }
}