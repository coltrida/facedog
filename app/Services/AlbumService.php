<?php

namespace App\Services;

use App\Models\Album;

class AlbumService
{
    public function saveAlbum($request)
    {
        return Album::create($request->all());
    }
}
