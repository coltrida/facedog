<?php

namespace App\Services;

use App\Models\Post;
use App\Models\User;

class PostService
{
    public function listPost()
    {
        return Post::latest()->get();
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
}
