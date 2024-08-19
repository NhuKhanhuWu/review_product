<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "price"
    ];

    public function review()
    {
        return $this->hasMany(Review::class);
    }

    // RATING: START
    public function scopeAvgRating(Builder $query): Builder | QueryBuilder
    {
        return $query->withAvg('review', 'star_rating');
    }
    // RATING: END

    // COUNT REVIEW: START
    public function scopeTotalReview(Builder $query): Builder | QueryBuilder
    {
        return $query->withCount('review');
    }
    // COUNT REVIEW: END

    // SEARCH: START
    public function scopeTitle(Builder $query, string $title): Builder | QueryBuilder
    {
        return $query->where("title", "like", "%" . $title . "%");
    }
    // SEARCH: END

    // SORT: START
    public function scopeSortA_Z(Builder $query): Builder | QueryBuilder
    {
        return $query->orderBy('name', 'asc');
    }

    public function scopeSortZ_A(Builder $query): Builder | QueryBuilder
    {
        return $query->orderBy('name', 'desc');
    }

    public function scopeSortExpensive(Builder $query): Builder | QueryBuilder
    {
        return $query->orderBy('price', 'desc');
    }

    public function scopeSortCheap(Builder $query): Builder | QueryBuilder
    {
        return $query->orderBy('price', 'asc');
    }

    public function scopeSortRating(Builder $query, $order): Builder | QueryBuilder
    {
        return $query->orderBy('review_avg_star_rating', $order);
    }
    // SORT: END

    // FILTER: START
    public function scopeRangePrice(Builder $query, $from, $to): Builder | QueryBuilder
    {
        if ($from === null && $to === null) return $query;

        if ($from === null && $to !== null) return $query->where('price', '<=', $to);

        if ($from !== null && $to === null) return $query->where('price', '>=', $from);

        return $query->where('price', '>=', $from)->where('price', '<=', $to);
    }

    public function scopeFilterReview(Builder $query, $rating, $product): Builder | QueryBuilder
    {
        // return $product->review;
        return Review::where('product_id', $product->id)->where('star_rating', $rating);
    }
    // FILTER: END
}
