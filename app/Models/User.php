<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{     
    use Notifiable;

    protected $table = 'user';
    protected $primaryKey = 'username';

    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'username',
        'nama',
        'email',
        'password',
        'role_user',
        'no_whatsapp',
        'photo'
    ];

    protected $hidden = [
        'password'
    ];
}
