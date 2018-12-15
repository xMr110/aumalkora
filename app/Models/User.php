<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['name', 'email', 'password','role' ];


    protected $hidden = ['password', 'remember_token', ];


    public  function scopeAdmins($query)
    {
        return $query->where('role', 1);
    }
}
