<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NewsRating extends Model
{
    protected $table = 'news_ratings';
    protected $fillable = [
        'news_id',
        'sub_id',
        'rating'
    ];
}
