<?php

namespace App\Livewire\Component;

use Livewire\Attributes\On;
use Livewire\Component;

class ImageDropDown extends Component
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

    public function render()
    {
        return view('livewire.component.image-drop-down');
    }
}
