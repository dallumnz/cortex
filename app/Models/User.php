<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use HasFactory;

    protected $fillable = ['name', 'email', 'password', 'status'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'status' => 'boolean',
    ];

    protected $appends = ['gravatar'];

    public function posts()
    {
        return $this->hasMany(Post::class, 'created_by');
    }

    public function getGravatarAttribute()
    {
        return 'https://www.gravatar.com/avatar/'.md5(strtolower(trim($this->email)));
    }
}
