<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Searchable;

    const POST_FORMAT = 'post_format';

    const ARTICLE = 'article';

    const CREATE_ARTICLE = 'article/create';

    const ADD_ARTICLE = 'add_article';

    const TYPE_NONE = 0;

    const TYPE_ARTICLE = 1;

    const TYPE = [
        self::TYPE_ARTICLE => 'Article',
    ];

    protected $fillable = [
        'slug',
        'title',
        'description',
        'keywords',
        'tags',
        'status',
        'visibility',
        'featured',
        'breaking',
        'recommended',
        'headline',
        'post_type',
        'category_id',
        'subcategory_id',
        'created_by',
    ];

    protected $casts = [
        'status' => 'boolean',
        'visibility' => 'boolean',
        'featured' => 'boolean',
        'breaking' => 'boolean',
        'recommended' => 'boolean',
        'headline' => 'boolean',
    ];

    protected $with = ['media'];

    protected $appends = ['post_image', 'type_name'];

    public function shouldBeSearchable(): bool
    {
        return $this->status;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function postArticle()
    {
        return $this->hasOne(PostArticle::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function getTypeNameAttribute($type)
    {
        return self::TYPE[$this->post_type];
    }

    public function getPostImageAttribute()
    {
        $media = $this->getMedia('post_images')->first();
        if (! empty($media)) {
            return $media->getFullUrl();
        }

        return asset('/images/posts/default.jpg');
    }
}
