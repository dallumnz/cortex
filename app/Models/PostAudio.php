<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class PostArticle extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'post_id',
        'audio_content',
    ];

    protected $casts = [
        'post_id' => 'integer',
        'audio_content' => 'string',
    ];

    protected $appends = ['post_audio'];

    protected $table = 'post_audio';

    public function post()
    {
        return $this->hasOne(Post::class, 'post_id');
    }

    public function getPostAudioAttribute()
    {
        $media = $this->getMedia('post_audio');
        $mediaUrl = [];
        foreach ($media as $audio) {
            $mediaUrl[] = $audio->getFullUrl();
        }

        return $mediaUrl;
    }
}
