<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NewsFeedbackUser extends Model
{
    protected $table = 'news_feedback_users';
    protected $fillable = [
        'news_id', 'sub_id', 'feedback'
    ];
}
