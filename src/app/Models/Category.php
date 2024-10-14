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

    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, 'favorites', 'category_id', 'user_id')->withTimestamps();
    }

    protected $appends = ['is_favorited'];

    public function getIsFavoritedAttribute()
    {
        return $this->favoritedByUsers()->where('users.id', Auth::id())->exists();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
