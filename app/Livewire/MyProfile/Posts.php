<?php

namespace App\Livewire\MyProfile;

use App\Services\PostService;
use Livewire\Attributes\On;
use Livewire\Component;

class Posts extends Component
{
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

    public function render(PostService $postService)
    {
        return view('livewire.my-profile.posts', [
            'myPosts' => $postService->myPostsWithComments(auth()->id())
        ]);
    }
}
