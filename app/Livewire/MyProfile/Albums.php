<?php

namespace App\Livewire\MyProfile;

use App\Services\AlbumService;
use Livewire\Component;

class Albums extends Component
{
    public function render(AlbumService $albumService)
    {
        return view('livewire.my-profile.albums', [
            'myAlbums' => $albumService->myAlbums(auth()->id())
        ]);
    }
}
