<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'invoice_id', 'product_name', 'product_quantity'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }



    // public static function boot()
    // {
    //     parent::boot();


    //     static::deleting(function () {
    //         Cache::flush();
    //     });
    //     static::updating(function () {
    //         Cache::flush();
    //     });
    //     static::restoring(function () {
    //         Cache::flush();
    //     });
    //     static::creating(function () {
    //         Cache::flush();
    //         // dd(Cache::tags(['blog-post'])->forget("blog-post-{$blogPost->id}"));
    //     });
    // }
}
