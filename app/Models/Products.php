<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\DeletedAdminScope;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
// use App\Scopes\LatestScope;



class Products extends Model

{
    use HasFactory;

    use SoftDeletes;

    // mass assigned
    protected $fillable = ["name", "type", "manufacturer", "sales", "price_range", "user_id", "quantity", "discount"];



    // public function comments()
    // {
    //     return $this->hasMany(Comment::class)->latest();
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function image()
    {
        return $this->hasOne(ProductImages::class);
    }

    public function scopeOrderByName(Builder $query)
    {
        return $query->orderBy("name", 'asc');
    }
    public function scopeOrderByPhone(Builder $query)
    {
        return $query->orderBy("phone", 'asc');
    }
    public function scopeOrderBySales(Builder $query)
    {
        return $query->orderBy("sales", 'asc');
    }
    public function scopeOrderByPrice(Builder $query)
    {
        return $query->orderBy("price_range", 'asc');
    }
    public function scopeOrderByUser(Builder $query)
    {
        return $query->orderBy("user_id", 'asc');
    }

    // public function scopeMostCommented(Builder $query)
    // {
    //     return $query->withCount('comments')->orderBy('comments_count', 'desc');
    // }
    public function scopeWithRelations(Builder $query)
    {
        return $query->latest()
            // ->withCount('comments')
            ->with('user')
            ->with('tags');
    }


    public static function boot()
    {
        // static::addGlobalScope(new DeletedAdminScope);
        parent::boot();

        // static::addGlobalScope(new LatestScope);

        static::deleting(function (Products $product) {
            // $product->comments()->delete();
            // Cache::tags(['products'])->forget("products-{$product->id}");
            Cache::flush();
        });
        static::updating(function (Products $product) {
            Cache::flush();
        });
        static::restoring(function (Products $product) {
            Cache::flush();
            // $product->comments()->restore();
        });
        static::creating(function () {
            Cache::flush();
            // dd(Cache::tags(['blog-post'])->forget("blog-post-{$blogPost->id}"));
        });
    }
}
