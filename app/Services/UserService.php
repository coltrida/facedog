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

    public function myLastFourFriends($idUser)
    {
        return User::with(['followers' => function($f){
            $f->latest()->take(4);
        }])
            ->find($idUser)->followers;
    }

    public function myLastFiveFriends($idUser)
    {
        return User::with(['followers' => function($f){
            $f->latest()->take(5);
        }])
            ->find($idUser)->followers;
    }

    public function myLastFiveFollowings($idUser)
    {
        return User::with(['following' => function($f){
            $f->latest()->take(5);
        }])
            ->find($idUser)->following;
    }
}
