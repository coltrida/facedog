<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    protected $guarded = [];

    public function getPathPhotoAttribute()
    {
        if(Storage::disk('public')->exists('/albums/'.$this->album->id.'/'.$this->id.'.jpg'))
        {
            return '/storage/albums/'.$this->album->id.'/'.$this->id.'.jpg';
        }
        return '/storage/albums/photo.jpg';
    }

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function commentsPhoto()
    {
        return $this->hasMany(Commentphoto::class);
    }
}
