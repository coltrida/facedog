<?php

namespace App\Livewire;

use App\Services\UserService;
use Livewire\Component;

class MyProfile extends Component
{
    public function render(UserService $userService)
    {
        return view('livewire.my-profile', [
            'myPosts' => $userService->mylastPosts()
        ]);
    }
}
