<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggle(Post $post)
    {
        $user = Auth::user();
        $existing_like = $post->likes()->where('user_id', $user->id)->first();

        if ($existing_like) {
            $existing_like->delete();
            $isLiked = false;
        } else {
            $post->likes()->create([
                'user_id' => $user->id,
            ]);
            $isLiked = true;
        }

        return response()->json([
            'success' => true,
            'isLiked' => $isLiked,
            'likesCount' => $post->likes()->count()
        ]);
    }
}
