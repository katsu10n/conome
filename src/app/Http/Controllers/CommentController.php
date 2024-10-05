<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|max:1000',
        ]);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->user_id = Auth::id();
        $comment->post_id = $post->id;
        $comment->save();

        return redirect()->route('posts.show', ['uid' => $post->user->uid, 'post' => $post]);
    }

    public function destroy(Comment $comment)
    {
        if (Auth::id() !== $comment->user_id) {
            return redirect()->back();
        }

        $comment->delete();
        return redirect()->back();
    }
}
