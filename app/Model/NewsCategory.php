<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $table = 'news_categories';
    protected $fillable = [
        'categories_id',
        'news_id'
    ];

    public function getNews()
    {
        return $this->hasOne(
            'App\Model\News', 'id', 'news_id'
        );
    }
    public function getCategory(){
        return $this->hasOne(
            'App\Model\Category','id','categories_id'
        );
    }
}
