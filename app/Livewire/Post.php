<?php

namespace App\Livewire;

use App\Services\PostService;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Post extends Component
{
    public $post;
    public $photos = [];

    public function mount($idPost, PostService $postService)
    {
        $this->post = $postService->post($idPost);
        $this->photos = Storage::disk('public')->files('/posts/'.$idPost);
    }

    public function render()
    {
        return view('livewire.post');
    }
}
