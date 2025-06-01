<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Album extends Model
{
    protected $guarded = [];

    public function getPathPhotoAttribute()
    {
        $directoryPath = 'albums/' . $this->id;

        if (Storage::disk('public')->exists($directoryPath)) {
            $files = Storage::disk('public')->files($directoryPath);

            if (empty($files)) {
                return '/storage/albums/photo.jpg';
            } else {
                $firstFile = $files[0];
                return '/storage/'.$firstFile;
            }
        }
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
