<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggle(Post $post)
    {
        $user = Auth::user();
        $isLiked = $post->isLikedBy($user);

        if ($isLiked) {
            $user->likePosts()->detach($post->id);
        } else {
            $user->likePosts()->attach($post->id);
        }

        return response()->json([
            'success' => true,
            'isLiked' => !$isLiked,
            'likesCount' => $post->likes()->count()
        ]);
    }
}
