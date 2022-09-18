<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    function posts()
    {
        return $this->hasMany(Post::class);
    }

    function comments()
    {
        return $this->hasManyThrough(Comment::class, Post::class);
    }
}
