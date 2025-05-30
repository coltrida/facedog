<?php

namespace App\Livewire\Component;

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
    public $version;

    public function mount()
    {
        $this->version = now()->timestamp;
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

        $this->dispatch('updatePosts');
    }

    public function render()
    {
        return view('livewire.component.modal-actions');
    }
}
