<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private function buildQuery($category = null, $followedUserIds = null)
    {
        $query = Post::with(['user', 'category'])->orderBy('created_at', 'desc');

        if ($category) {
            $query->where('category_id', $category->id);
        }

        if ($followedUserIds) {
            $query->whereIn('user_id', $followedUserIds);
        }

        return $query;
    }

    public function index(Category $category = null)
    {
        $currentUserId = Auth::id();
        $posts = $this->buildQuery($category)->get();

        return view('pages.posts.index', [
            'posts' => $posts,
            'currentUserId' => $currentUserId,
            'category' => $category,
            'isFollowedPosts' => false
        ]);
    }

    public function indexFollowed(Category $category = null)
    {
        $currentUserId = Auth::id();
        $followedUserIds = Auth::user()->following()->pluck('users.id');
        $posts = $this->buildQuery($category, $followedUserIds)->get();

        return view('pages.posts.index', [
            'posts' => $posts,
            'currentUserId' => $currentUserId,
            'category' => $category,
            'isFollowedPosts' => true
        ]);
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
        $post->load('comments.user');

        return view('pages.posts.show', [
            'post' => $post,
            'currentUserId' => Auth::id(),
        ]);
    }

    public function destroy(Post $post)
    {
        try {
            if (Auth::id() !== $post->user_id) {
                throw new \Exception('権限がありません');
            }

            $post->delete();

            return redirect()->route('posts.index')
                ->with('success', '投稿「' . $post->title . '」を削除しました');
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
