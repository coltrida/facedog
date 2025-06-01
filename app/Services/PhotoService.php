<?php

namespace App\Services;

use App\Models\Album;
use App\Models\Photo;
use App\Models\User;

class PhotoService
{
    public function savePhoto($request)
    {
        return Photo::create($request->all());
    }

    public function myRandomPhotos($idUser)
    {
        $user = User::with('albums')->find($idUser);

        // Se l'utente non ha album, non ci saranno foto
        if ($user && $user->albums->isNotEmpty()) {
            $albumIds = $user->albums->pluck('id');

            $randomPhotos = Photo::with('album')->whereIn('album_id', $albumIds)
                ->inRandomOrder()
                ->take(6)
                ->get();
        } else {
            $randomPhotos = collect(); // Ritorna una collezione vuota se non ci sono album o l'utente non esiste
        }

        // Ora hai $user con i suoi album, e $randomPhotos contiene le 4 foto casuali da tutti gli album combinati.

        return $randomPhotos;
    }

    public function photosOfAlbum($idAlbum)
    {
        return Album::with('photos')->find($idAlbum);
    }
}
