<?php

namespace App\Livewire;

use App\Services\AlbumService;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Album extends Component
{
    public $album;
    public $photos = [];

    public function mount($idAlbum, AlbumService $albumService)
    {
        $this->album = $albumService->album($idAlbum);
        $this->photos = Storage::disk('public')->files('/albums/'.$idAlbum);
    }

    public function deletePhoto($photo)
    {
        $res = Storage::disk('public')->delete($photo);
        if ($res) {
            $this->photos = array_filter($this->photos, function($value) use ($photo) {
                return $value !== $photo; // Restituisce true per gli elementi da mantenere
            });
            $this->dispatch('confermaEliminazione');
        }
    }

    public function render()
    {
        return view('livewire.album');
    }
}
