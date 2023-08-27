<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestsUpdateModel extends Model
{    
    /**
     * Таблица для подключения к mysql
     *
     * @var string
     */
    protected $table = 'requests';
    
    /**
     * Необходимые колонки
     *
     * @var array
     */
    protected $fillable = [
        'comment',
        'status'
    ];
}
