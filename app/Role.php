<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    // https://medium.com/@ezp127/laravel-5-4-native-user-authentication-role-authorization-3dbae4049c8a
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
