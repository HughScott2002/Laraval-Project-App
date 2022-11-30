<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;


    public function blogPosts()
    {
        return $this->belongsToMany(BlogPost::class)->withTimestamps();
    }
    public function products()
    {
        return $this->belongsToMany(Products::class)->withTimestamps();
    }
}
