<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('posts.index');
    }
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/settings', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/followed', [PostController::class, 'indexFollowed'])->name('posts.followed');
    Route::get('/{uid}/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::get('/categories/{category:slug}', [PostController::class, 'index'])->name('posts.category');
    Route::get('/categories/{category:slug}/followed', [PostController::class, 'indexFollowed'])->name('posts.category.followed');

    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    Route::post('/categories/{category}/favorite', [FavoriteController::class, 'toggle'])->name('categories.favorite');
    Route::post('/posts/{post}/like', [LikeController::class, 'toggle'])->name('posts.like');

    Route::get('/{uid}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/{uid}/comments', [ProfileController::class, 'comments'])->name('profile.comments');
    Route::get('/{uid}/likes', [ProfileController::class, 'likes'])->name('profile.likes');

    Route::post('/follow/{user}', [FollowController::class, 'follow'])->name('follow');
    Route::delete('/unfollow/{user}', [FollowController::class, 'unfollow'])->name('unfollow');
});
require __DIR__ . '/auth.php';
