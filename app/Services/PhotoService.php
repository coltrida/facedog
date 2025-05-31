<?php

namespace App\Services;

use App\Models\Photo;

class PhotoService
{
    public function savePhoto($request)
    {
        return Photo::create($request->all());
    }
}
