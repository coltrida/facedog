<?php

namespace App\Services;

use App\Models\Post;
use App\Models\User;

class PostService
{
    public function listPostPaginate($page)
    {
        return Post::latest()->paginate(6, ['*'], 'page', $page);
    }

    public function savePost($request)
    {
        return Post::create($request->all());
    }

    public function myLastPosts($idUser)
    {
        return User::with(['posts' => function($p){
            $p->latest()->take(3);
        }])->find($idUser)->posts;
    }

    public function myPosts($idUser)
    {
        return User::with(['posts' => function($p){
            $p->latest();
        }])->find($idUser)->posts;
    }

    public function post($idPost)
    {
        return Post::find($idPost);
    }

    public function deletePost($idPost)
    {
        return Post::find($idPost)->delete();
    }
}
