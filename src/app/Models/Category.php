<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Category extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    protected $appends = ['is_favorited'];

    public function getIsFavoritedAttribute()
    {
        return $this->favorites()->where('user_id', Auth::id())->exists();
    }
}
