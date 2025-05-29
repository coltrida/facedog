<?php

namespace App\Livewire;

use App\Services\PostService;
use Livewire\Attributes\On;
use Livewire\Component;

class HomeFace extends Component
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
        return view('livewire.home-face', [
            'posts' => $postService->listPost()
        ]);
    }
}
