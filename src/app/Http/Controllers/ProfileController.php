<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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

    public function update(ProfileUpdateRequest $request)
    {
        $user = $request->user();
        $validatedData = $request->validated();

        try {
            if ($user->id === 1) {
                throw new \Exception('テストユーザーのプロフィールは変更できません');
            }

            $emailChanged = $user->email !== $validatedData['email'];

            $user->fill($validatedData);

            if ($emailChanged) {
                $user->email_verified_at = null;
            }

            $user->save();

            $message = 'プロフィールが更新されました';

            return redirect()->back()->with('success', $message);
        } catch (\Exception $e) {
            Log::error('プロフィール更新エラー: ' . $e->getMessage());
            if ($e->getMessage() === 'テストユーザーのプロフィールは変更できません') {
                return back()->with('error', 'テストユーザーのプロフィールは変更できません');
            }

            return back()->with('error', 'プロフィールの更新に失敗しました');
        }
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        if ($user->id === 1) {
            return redirect()->back();
        } else {
            Auth::logout();

            $user->delete();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return Redirect::to('/');
        }
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
