<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Category $category = null)
    {
        $currentUserId = Auth::id();

        $postsQuery = Post::with(['user', 'category'])
            ->orderBy('created_at', 'desc');

        if ($category) {
            $postsQuery->where('category_id', $category->id);
        }

        $posts = $postsQuery->get()->map(function ($post) {
            return $post;
        });

        return view('pages.posts.index', compact('posts', 'currentUserId', 'category'));
    }

    public function indexFollowed(Category $category = null)
    {
        $currentUserId = Auth::id();
        $followedUserIds = Auth::user()->following()->pluck('users.id');

        $postsQuery = Post::with(['user', 'category'])
            ->whereIn('user_id', $followedUserIds)
            ->orderBy('created_at', 'desc');

        if ($category) {
            $postsQuery->where('category_id', $category->id);
        }

        $posts = $postsQuery->get()->map(function ($post) {
            return $post;
        });

        $isFollowedPosts = true;

        return view('pages.posts.index', compact('posts', 'currentUserId', 'isFollowedPosts', 'category'));
    }

    public function store(StorePostRequest $request)
    {
        try {
            $post = Auth::user()->posts()->create($request->validated());

            return redirect()->route('posts.index')
                ->with('success', '投稿「' . $post->title . '」を作成しました');
        } catch (\Exception $e) {
            Log::error('投稿作成エラー: ' . $e->getMessage());
            return back()->withInput()->with('error', '投稿の投稿に失敗しました');
        }
    }

    public function show($uid, Post $post)
    {
        $currentUserId = Auth::id();
        $post->load('comments.user');

        return view('pages.posts.show', compact('post', 'currentUserId'));
    }

    public function destroy(Post $post)
    {
        try {
            if (Auth::id() !== $post->user_id) {
                throw new \Exception('権限がありません');
            }

            $post->delete();

            return redirect()->route('posts.index')
                ->with('success', '投稿を削除しました');
        } catch (\Exception $e) {
            Log::error('投稿削除エラー: ' . $e->getMessage());

            if ($e->getMessage() === '権限がありません') {
                return back()->with('error', 'この投稿を削除する権限がありません');
            }

            return back()->with('error', '投稿の削除に失敗しました');
        }
    }

    public function getPopularPosts()
    {
        $recentPopular = Post::withCount('likes')
            ->orderBy('likes_count', 'desc')
            ->where('created_at', '>=', now()->subDays(7))
            ->take(5)
            ->get();

        $allTimePopular = Post::withCount('likes')
            ->orderBy('likes_count', 'desc')
            ->take(5)
            ->get();

        return [
            'recent' => $recentPopular,
            'allTime' => $allTimePopular
        ];
    }
}
