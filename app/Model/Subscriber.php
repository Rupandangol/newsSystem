<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;


class Subscriber extends Authenticatable
{
    protected $table = 'subscribers';
    protected $fillable = [
        'username',
        'email',
        'password',
        'address'
    ];
}
