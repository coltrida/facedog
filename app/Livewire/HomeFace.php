<?php

namespace App\Livewire;

use App\Services\PostService;
use Livewire\Component;

class HomeFace extends Component
{
    public function render(PostService $postService)
    {
        return view('livewire.home-face', [
            'posts' => $postService->listPost()
        ]);
    }
}
