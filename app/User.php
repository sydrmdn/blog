<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'slug', 'bio', 'twitter_url', 'facebook_url'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
