<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'parent_category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'parent_category_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
