<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function aggiornaDati($reques)
    {
        return User::findOrFail(auth()->id())->update($reques->all());
    }

    public function updatePassword($newPassword)
    {
        User::findOrFail(auth()->id())->update([
            'password' => $newPassword
        ]);
    }
}
