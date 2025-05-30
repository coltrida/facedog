<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory, Notifiable;

    protected $guarded = [];

    public function getPathPhotoAttribute()
    {
        if(Storage::disk('public')->exists('/posts/'.$this->id.'.jpg'))
        {
            return '/storage/posts/'.$this->id.'.jpg';
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
