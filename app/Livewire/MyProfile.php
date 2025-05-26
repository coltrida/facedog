<?php

namespace App\Livewire;

use App\Services\AlbumService;
use App\Services\PostService;
use Livewire\Component;

class MyProfile extends Component
{


    public function render()
    {
        return view('livewire.my-profile');
    }
}
