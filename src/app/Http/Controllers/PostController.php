<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index($category = null)
    {
        $currentUserId = Auth::id();

        $postsQuery = Post::with(['user', 'category'])
            ->orderBy('created_at', 'desc');

        if ($category) {
            $postsQuery->where('category_id', $category);
        }

        $posts = $postsQuery->get()->map(function ($post) {
            $post->created_at_for_humans = $post->created_at->diffForHumans();
            return $post;
        });

        return view('pages.posts.index', compact('posts', 'currentUserId'));
    }

    public function store(StorePostRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = Auth::id();

        $post = Post::create($validatedData);

        return redirect()->route('posts.index')->with('success', '投稿が作成されました。');
    }

    public function show(Post $post)
    {
        $currentUserId = Auth::id();
        $post->load('comments.user');

        return view('pages.posts.show', compact('post', 'currentUserId'));
    }

    public function edit(Post $post)
    {
        //
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        if (Auth::id() !== $post->user_id) {
            return redirect()->route('posts.index');
        }

        $post->delete();

        return redirect()->route('posts.index');
    }

    public function indexFollowed($category = null)
    {
        $currentUserId = Auth::id();
        $followedUserIds = Auth::user()->following()->pluck('users.id');

        $postsQuery = Post::with(['user', 'category'])
            ->whereIn('user_id', $followedUserIds)
            ->orderBy('created_at', 'desc');

        if ($category) {
            $postsQuery->where('category_id', $category);
        }

        $posts = $postsQuery->get()->map(function ($post) {
            $post->created_at_for_humans = $post->created_at->diffForHumans();
            return $post;
        });

        $isFollowedPosts = true;

        return view('pages.posts.index', compact('posts', 'currentUserId', 'isFollowedPosts'));
    }
}
