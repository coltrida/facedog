<?php

namespace App\Livewire\Component;

use App\Services\PhotoService;
use Livewire\Component;

class MyProfileRandomPhotos extends Component
{
    public function render(PhotoService $photoService)
    {
        return view('livewire.component.my-profile-random-photos', [
            'myRandomPhotos' => $photoService->myRandomPhotos(auth()->id())
        ]);
    }
}
