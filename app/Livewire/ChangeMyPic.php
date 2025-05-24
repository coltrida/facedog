<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ChangeMyPic extends Component
{
    use WithFileUploads;

    #[Validate('image|max:2048')] // 2MB Max
    public $photo;

    public function salvaPhoto()
    {
        if ($this->photo){
            $filename = auth()->id(). '.jpg';
            $this->photo->storeAs('profiles', $filename);

            $this->dispatch('updateMyPic');
        }
    }

    public function render()
    {
        return view('livewire.change-my-pic');
    }
}
