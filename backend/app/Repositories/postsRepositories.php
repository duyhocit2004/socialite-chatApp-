<?php

namespace App\Repositories;

use App\Models\post;
use Illuminate\Http\Request;

class PostsRepositories
{

    public function getAllPost(Request $request)
    {
        try {
            $limit = (int) $request->query('limit', 10);
            $page = (int) $request->query('page', 1);
            $offset = ($page - 1) * $limit;

            $SearchContent = $request->query('SearchContent','');
            $typePost = $request->query('typePost','');
            $postStatus = $request->query('postStatus','');

            $post = post::query()
                ->select(
                    'posts.*',
                    'users.name as username',
                    'users.id as user_id',
                    'post_status.name as status_name'
                )

                ->join('users', 'users.id', '=', 'posts.user_id')
                ->join('post_status', 'post_status.id', '=', 'posts.post_status_id');

            if (!isset($SearchContent)) {
                $post->where('posts.content', 'LIKE', "%{$SearchContent}%");
            }

            if (!isset($typePost)) {
                $post->where('posts.source_type', $typePost);
            }

            if (!isset($postStatus)) {
                $post->where('posts.post_status_id',  $postStatus );
            }

           $post = $post->limit($limit)
                ->offset($offset)
                ->orderBy('posts.created_at', 'DESC')
                ->get();

            return response()->json([
                'data' => [
                    'post' => $post,
                    'page' => $page,
                    'limit' => $limit,
                    'offset' => $offset
                ],
                'message' => "cập thông tin thành công",
                'status' => 200
            ], 200);
        } catch (\Throwable $th) {
             return response()->json([
                'data' => '',
                'message' => $th->getMessage(),
                'status' => 500
            ], 500);
        }

    }
}