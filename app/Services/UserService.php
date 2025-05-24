<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function myLastPosts()
    {
        return User::with(['posts' => function($p){
            $p->latest()->take(3);
        }])->find(auth()->id())->posts;
    }
}
