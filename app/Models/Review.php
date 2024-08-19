<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'review_txt',
        'star_rating',
        'user_id',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function like_dislike()
    {
        return $this->hasMany(ReviewLikeDislike::class);
    }

    // count like, dislike
    public function scopeCountLike(Builder $query, $review_id)
    {
        $count = \App\Models\ReviewLikeDislike::where('review_id', $review_id)->where('index', 1)->count();
        return $count;
    }
    public function scopeCountDislike(Builder $query, $review_id)
    {
        $count = \App\Models\ReviewLikeDislike::where('review_id', $review_id)->where('index', 0)->count();
        return $count;
    }
}
