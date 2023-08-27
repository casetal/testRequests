<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /**
     * Таблица для подключения к mysql
     *
     * @var string
     */
    protected $table = 'admin';
    
    /**
     * Необходимые колонки
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'password',
        'api_token'
    ];
}
