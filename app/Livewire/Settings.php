<?php

namespace App\Livewire;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Settings extends Component
{

    public $name;
    public $surname;
    public $username;
    public $birthdate;
    public $phone;
    public $description;
    public $email;

    public $currentPassword;
    public $newPassword;
    public $confirmNewPassword;

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->surname = auth()->user()->surname;
        $this->username = auth()->user()->username;
        $this->birthdate = auth()->user()->birthdate;
        $this->phone = auth()->user()->phone;
        $this->description = auth()->user()->description;
        $this->email = auth()->user()->email;
    }

    public function cambiaDati(UserService $userService)
    {
        $request = new Request();
        $request->merge([
            'name' => $this->name,
            'surname' => $this->surname,
            'username' => $this->username,
            'birthdate' => $this->birthdate,
            'phone' => $this->phone,
            'description' => $this->description,
        ]);

        $res = $userService->aggiornaDati($request);

        if ($res){
            $this->dispatch('datiAggiornati', 'User Data Updated!');
        }
    }

    public function changePassword(UserService $userService)
    {
        if (! Hash::check($this->currentPassword, auth()->user()->password)) {
            $this->dispatch('errorePassword', 'The current password incorrect!');
        } elseif ($this->newPassword !== $this->confirmNewPassword){
            $this->dispatch('errorePassword', 'The repeat password dont match');
        } else{
            $userService->updatePassword(Hash::make($this->newPassword));
            $this->reset(['currentPassword', 'newPassword', 'confirmNewPassword']);
            $this->dispatch('datiAggiornati', 'Password Updated!');
        }
    }

    public function render()
    {
        return view('livewire.settings');
    }
}
