<?php

namespace App\Livewire;

use App\Services\AlbumService;
use App\Services\PostService;
use Livewire\Component;

class MyProfile extends Component
{
    public function render(PostService $postService, AlbumService $albumService)
    {
        return view('livewire.my-profile', [
            'myPosts' => $postService->mylastPosts(auth()->id()),
            'myLastAlbums' => $albumService->myLastAlbums(auth()->id())
        ]);
    }
}
