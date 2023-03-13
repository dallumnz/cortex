<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analytic extends Model
{
    use HasFactory;

    protected $fillable = [
        'session',
        'uri',
        'ip',
        'country',
        'browser',
        'os',
        'user_id',
        'post_id',
        'meta',
    ];
}
