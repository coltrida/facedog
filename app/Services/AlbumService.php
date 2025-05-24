<?php

namespace App\Services;

use App\Models\Album;
use App\Models\User;

class AlbumService
{
    public function saveAlbum($request)
    {
        return Album::create($request->all());
    }

    public function myLastAlbums($idUser)
    {
        return User::with(['albums' => function($a){
            $a->latest()->take(3);
        }])->find($idUser)->albums;
    }
}
