<?php

namespace App\Livewire\Component;

use App\Services\UserService;
use Livewire\Component;

class MyProfileFriends extends Component
{
    public function render(UserService $userService)
    {
        return view('livewire.component.my-profile-friends', [
            'myLastFourFriends' => $userService->myLastFourFriends(auth()->id())
        ]);
    }
}
