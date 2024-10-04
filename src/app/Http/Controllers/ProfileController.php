<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function show($uid)
    {
        $user = User::where('uid', $uid)->withCount('posts')->firstOrFail();
        $posts = $user->posts()->with(['user', 'category', 'comments', 'likes'])->latest()->get();
        return view('pages.profile.show', compact('user', 'posts'));
    }

    public function edit(Request $request): View
    {
        return view('pages.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('pages.profile.edit')->with('status', 'profile-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function comments($uid)
    {
        $user = User::where('uid', $uid)->withCount(['comments'])->firstOrFail();
        $posts = $user->comments()->with(['post.user', 'post.category', 'post.comments', 'post.likes'])
            ->latest()
            ->get()
            ->pluck('post')
            ->unique();
        return view('pages.profile.show', compact('user', 'posts'));
    }

    public function likes($uid)
    {
        $user = User::where('uid', $uid)->withCount(['likes'])->firstOrFail();
        $posts = $user->likes()->with(['post.user', 'post.category', 'post.comments', 'post.likes'])
            ->latest()
            ->get()
            ->pluck('post')
            ->unique();
        return view('pages.profile.show', compact('user', 'posts'));
    }
}
