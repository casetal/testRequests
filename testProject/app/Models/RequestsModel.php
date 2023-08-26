<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestsModel extends Model
{
    protected $table = 'requests';

    protected $fillable = [
        'name',
        'email',
        'message',
        'status'
    ];

    use HasFactory;
}
