<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
        'visibility',
        'content',
    ];

    protected $casts = [
        'status' => 'boolean',
        'visibility' => 'boolean',
    ];
}
