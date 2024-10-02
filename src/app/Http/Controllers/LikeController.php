<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store(Post $post)
    {
        $post->likes()->create([
            'user_id' => Auth::id(),
        ]);

        return redirect()->back();
    }

    public function destroy(Post $post)
    {
        $post->likes()->where('user_id', Auth::id())->delete();

        return redirect()->back();
    }
}
