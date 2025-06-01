<?php

namespace App\Livewire\MyProfile;

use App\Services\AlbumService;
use App\Services\PhotoService;
use Livewire\Component;

class Photos extends Component
{
    public $albumWithphotos;

    public function mount($idAlbum, PhotoService $photoService)
    {
        $this->albumWithphotos = $photoService->photosOfAlbum($idAlbum);
    }

    public function render(AlbumService $albumService)
    {
        return view('livewire.my-profile.photos');
    }
}
