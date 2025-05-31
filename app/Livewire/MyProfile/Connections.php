<?php

namespace App\Livewire\MyProfile;

use App\Services\UserService;
use Livewire\Component;

class Connections extends Component
{
    public function render(UserService $userService)
    {
        return view('livewire.my-profile.connections', [
            'myLastFiveFriends' => $userService->myLastFiveFriends(auth()->id()),
            'myLastFiveFollowings' => $userService->myLastFiveFollowings(auth()->id()),
        ]);
    }
}
