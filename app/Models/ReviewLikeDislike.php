<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewLikeDislike extends Model
{
    protected $fillable = [
        'review_id',
        'user_id',
        'index'
    ];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function review()
    {
        return $this->belongsTo(Review::class);
    }
}
