<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request, Post $post)
    {
        try {
            $post->comments()->create(
                $request->validated() + ['user_id' => Auth::id()]
            );

            return back()->with('success', 'コメントを投稿しました');
        } catch (\Exception $e) {
            Log::error('コメント投稿作成エラー: ' . $e->getMessage());
            return back()->withInput()->with('error', 'コメントの投稿に失敗しました');
        }
    }

    public function destroy(Comment $comment)
    {
        try {
            if (Auth::id() !== $comment->user_id) {
                throw new \Exception('権限がありません');
            }

            $comment->delete();

            return back()->with('success', 'コメントを削除しました');
        } catch (\Exception $e) {
            Log::error('コメント削除エラー: ' . $e->getMessage());

            if ($e->getMessage() === '権限がありません') {
                return back()->with('error', 'このコメントを削除する権限がありません');
            }

            return back()->with('error', 'コメントの削除に失敗しました');
        }
    }
}
