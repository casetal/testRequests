<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestsUpdateModel extends Model
{
    protected $table = 'requests';

    protected $fillable = [
        'comment',
        'status'
    ];

    use HasFactory;
}
