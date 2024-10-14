<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FollowController extends Controller
{
    public function toggle(User $user)
    {
        try {
            $currentUser = Auth::user();

            if ($currentUser->id === $user->id) {
                throw new \Exception('自分自身をフォロー/フォロー解除することはできません');
            }

            $isFollowing = $currentUser->following()->toggle($user->id);

            $action = $isFollowing['attached'] ? 'フォロー' : 'フォロー解除';
            $message = "{$user->name}さんを{$action}しました。";

            return back()->with('success', $message);
        } catch (\Exception $e) {
            Log::error('フォロー操作中にエラー発生: ' . $e->getMessage());
            if ($e->getMessage() === '自分自身をフォロー/フォロー解除することはできません') {
                return back()->with('error', '自分自身をフォロー/フォロー解除することはできません');
            }

            return back()->with('error', 'フォロー/フォロー解除に失敗しました');
        }
    }
}
