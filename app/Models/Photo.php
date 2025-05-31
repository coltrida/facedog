<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $guarded = [];

    public function commentsPhoto()
    {
        return $this->hasMany(Commentphoto::class);
    }
}
