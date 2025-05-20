<?php

namespace App\Services;

use App\Models\Post;

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
}
