<?php

namespace App\Livewire;

use App\Services\AlbumService;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class MyAlbums extends Component
{

    public function deleteAlbum($idAlbum, AlbumService $albumService)
    {
        Storage::disk('public')->deleteDirectory('/albums/'.$idAlbum);
        $res = $albumService->deleteAlbum($idAlbum);
        if ($res) {
            $this->dispatch('confermaEliminazione');
        }
    }


    public function render(AlbumService $albumService)
    {
        return view('livewire.my-albums', [
            'myAlbums' => $albumService->myAlbums(auth()->id())
        ]);
    }
}
