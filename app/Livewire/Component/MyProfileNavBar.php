<?php

namespace App\Livewire\Component;

use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class MyProfileNavBar extends Component
{
    use WithFileUploads;

    #[Validate('image|max:2048')] // 2MB Max
    public $photo;

    #[Validate('image|max:2048')] // 2MB Max
    public $photoLandscape;

    public $version;

    public function mount()
    {
        $this->version = now()->timestamp;
    }

    #[On('updateMyPic')]
    #[On('updateMyLandscape')]
    public function updateMyPic()
    {
        // aggiorna la versione per forzare il refresh
        $this->version = now()->timestamp;
    }

    public function saveProfilePhoto()
    {
        $this->validate([
            'photo' => 'image|max:2048', // 2MB Max
        ]);

        $filename = auth()->id(). '.jpg';
        $this->photo->storeAs('profiles', $filename);

        $this->photo = null;

        $this->dispatch('updateMyPic');
    }

    public function saveLandscapePhoto()
    {

        /*$this->validate([
            'photoLandscape' => 'image|max:2048', // 2MB Max
        ]);*/
        //dd($this->photoLandscape);

        $filename = auth()->id(). '.jpg';
        $this->photoLandscape->storeAs('landscapes', $filename);

        $this->photoLandscape = null;

        $this->dispatch('updateMyLandscape');
    }

    public function render()
    {
        return view('livewire.component.my-profile-nav-bar');
    }
}
