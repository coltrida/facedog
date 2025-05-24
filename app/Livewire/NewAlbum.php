<?php

namespace App\Livewire;

use App\Services\AlbumService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewAlbum extends Component
{
    use WithFileUploads;

    public $title;

    #[Validate(['photo.*' => 'image|max:2048'])]
    public $photo = [];

    public function salvaAlbum(AlbumService $albumService)
    {
        $request = new Request();
        $request->merge([
            'title' => $this->title,
            'user_id' => auth()->id()
        ]);
        $album = $albumService->saveAlbum($request);

        if ($album){
            foreach ($this->photo as $pic){
                $idCartellaAlbum = $album->id;
                $nrPhotoInCartellaAlbum = Storage::disk('public')->exists('/albums/'.$idCartellaAlbum) ?
                    count(Storage::disk('public')->files('/albums/'.$idCartellaAlbum)) + 1 : 1;
                $filename = $nrPhotoInCartellaAlbum . '.' . $pic->extension();
                $pic->storeAs('albums/'.$idCartellaAlbum, $filename);
            }
            $this->reset(['title', 'photo']);
            session()->flash('status', 'Album Created.');
            $this->redirectRoute('myProfile');
        }
    }

    public function render()
    {
        return view('livewire.new-album');
    }
}
