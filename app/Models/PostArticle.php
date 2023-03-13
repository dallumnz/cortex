<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostArticle extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'content'];

    protected $table = 'post_articles';

    public function post()
    {
        return $this->hasOne(Post::class, 'post_id');
    }
}
