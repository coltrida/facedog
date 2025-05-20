<?php

namespace App\Livewire;

use App\Services\PostService;
use Livewire\Component;

class Home extends Component
{
    public function render(PostService $postService)
    {
        return view('livewire.home', [
            'posts' => $postService->listPost()
        ]);
    }
}
