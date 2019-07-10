<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable

{
    protected $table = 'admins';
    protected $fillable = [
        'username', 'password', 'email', 'address', 'type'
    ];
}
