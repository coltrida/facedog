<?php

namespace App\Livewire\MyProfile;

use App\Services\PostService;
use Livewire\Attributes\On;
use Livewire\Component;

class Posts extends Component
{
    public $version;
    public $myPosts;

    public function mount(PostService $postService)
    {
        $this->version = now()->timestamp;
        $this->myPosts = $postService->myPostsWithComments(auth()->id());
    }

    #[On('updateMyPic')]
    public function updateMyPic()
    {
        // aggiorna la versione per forzare il refresh
        $this->version = now()->timestamp;
    }

    #[On('updatePosts')]
    public function updatePost(PostService $postService)
    {
        $this->myPosts = $postService->myPostsWithComments(auth()->id());
    }

    public function render(PostService $postService)
    {
        return view('livewire.my-profile.posts');
    }
}
