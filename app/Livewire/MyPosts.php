<?php

namespace App\Livewire;

use App\Services\AlbumService;
use App\Services\PostService;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class MyPosts extends Component
{

    public function deletePost($idPost, PostService $postService)
    {
        Storage::disk('public')->deleteDirectory('/posts/'.$idPost);
        $res = $postService->deletePost($idPost);
        if ($res) {
            $this->dispatch('confermaEliminazione');
        }
    }

    public function render(PostService $postService)
    {
        return view('livewire.my-posts', [
            'myPosts' => $postService->myPosts(auth()->id())
        ]);
    }
}
