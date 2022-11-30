<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductImages extends Model
{
    use HasFactory;

    protected $fillable = ['path', 'product_id'];

    public function blogPost()
    {
        return $this->belongsTo(Products::class);
    }

    public function url()
    {
        return Storage::url($this->path);
    }
}
