<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NewsSearch extends Model
{
    protected $table = 'news_searches';
    protected $fillable = [
        'news_id',
        'metaKeywords'
    ];

    public function getNewsData()
    {
        return $this->hasOne(
            'App\Model\News',
            'id',
            'news_id'
        );
    }
}
