<?php

namespace App\Livewire;

use App\Services\AlbumService;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewAlbum extends Component
{
    use WithFileUploads;

    public $title;
    public $numberOfPhoto = 0;

    #[Validate('image|max:2048')] // 2MB Max
    public $photo;

    public function addNumberOfPhoto()
    {
        $this->numberOfPhoto ++;
    }

    public function salvaAlbum(AlbumService $albumService)
    {
        $request = new Request();
        $request->merge([
            'title' => $this->title,
        ]);
        $album = $albumService->saveAlbum($request);

        if ($album){
            $this->dispatch('mostraMessaggio', 'Salvataggio completato!');
        }


    }

    public function render()
    {
        return view('livewire.new-album');
    }
}
