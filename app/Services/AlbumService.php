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

    public function myAlbums($idUser)
    {
        return User::with(['albums' => function($a){
            $a->with('photos')->latest();
        }])->find($idUser)->albums;
    }

    public function album($idAlbum)
    {
        return Album::find($idAlbum);
    }

    public function deleteAlbum($idAlbum)
    {
        return Album::find($idAlbum)->delete();
    }
}
