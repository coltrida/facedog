<?php

namespace App\Livewire\Component;

use Livewire\Component;
use Livewire\WithFileUploads;

class MyProfileNavBar extends Component
{
    use WithFileUploads;

    public $photo;

    public function save()
    {
        dd($this->photo);
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);

        $this->photo->store('photos'); // Store in 'storage/app/photos'

        // Optionally, reset the photo property after upload
        $this->photo = null;
    }

    public function render()
    {
        return view('livewire.component.my-profile-nav-bar');
    }
}
