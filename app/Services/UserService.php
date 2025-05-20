<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function myPosts()
    {
        return User::with(['posts' => function($p){
            $p->latest();
        }])->find(auth()->id())->posts;
    }
}
