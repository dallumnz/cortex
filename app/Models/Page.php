<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'slug',
        'meta_title',
        'meta_description',
        'visibility',
        'breadcrumb',
        'content',
    ];

    protected $casts = [
        'visibility' => 'boolean',
        'breadcrumb' => 'boolean',
    ];
}
