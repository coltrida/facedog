<?php

namespace App\Livewire\Component;

use App\Services\AlbumService;
use App\Services\PhotoService;
use App\Services\PostService;
use Illuminate\Http\Request;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ModalActions extends Component
{
    use WithFileUploads;

    #[Validate('image|max:2048')] // 2MB Max
    public $photo;

    public $bodyPost;
    public $bodyPhoto;
    public $album_id;
    public $version;
    public $myAlbums;

    public function mount(AlbumService $albumService)
    {
        $this->version = now()->timestamp;
        $this->myAlbums = $albumService->myAlbums(auth()->id());
    }

    #[On('updateMyPic')]
    public function updateMyPic()
    {
        // aggiorna la versione per forzare il refresh
        $this->version = now()->timestamp;
    }

    public function savePhotoPost(PostService $postService)
    {
        $this->validate([
            'photo' => 'image|max:2048', // 2MB Max
        ]);

        $request = new Request();
        $request->merge([
            'user_id' => auth()->id(),
            'body' => $this->bodyPost
        ]);

        $post = $postService->createPost($request);

        $filename = $post->id. '.jpg';
        $this->photo->storeAs('posts', $filename);

        $this->reset(['photo', 'bodyPost']);

        $this->dispatch('updatePosts', 'post saved');
    }

    public function savePhoto(PhotoService $photoService)
    {
        $this->validate([
            'photo' => 'image|max:2048', // 2MB Max
        ]);

        $request = new Request();
        $request->merge([
            'album_id' => $this->album_id,
            'body' => $this->bodyPhoto
        ]);

        $photo = $photoService->savePhoto($request);

        $filename = '/'.$this->album_id.'/'.$photo->id. '.jpg';
        $this->photo->storeAs('albums', $filename);

        $this->reset(['photo', 'bodyPhoto', 'album_id']);

        $this->dispatch('updatePosts', 'photo saved');
    }

    public function render()
    {
        return view('livewire.component.modal-actions');
    }
}
