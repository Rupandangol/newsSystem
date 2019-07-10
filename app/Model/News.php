<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = [
        'title',
        'date',
        'details',
        'slug',
        'status',
        'image',
        'reporter'
    ];

    public function getCategories()
    {
      return  $this->belongsToMany(
            'App\Model\Category',
            'news_categories',
            'news_id',
            'categories_id'
        );
    }

}
