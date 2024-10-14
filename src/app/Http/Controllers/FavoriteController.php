<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class FavoriteController extends Controller
{
    public function toggle(Request $request, Category $category)
    {
        try {
            $user = Auth::user();

            $toggled = $user->favoriteCategories()->toggle($category->id);

            Cache::forget('sidebar_categories_' . $user->id);

            $action = $toggled['attached'] ? 'お気に入り' : 'お気に入り解除';
            $message = "カテゴリー「{$category->name}」を{$action}しました";

            return back()
                ->withInput(['scroll_to' => $request->input('scroll_position')])
                ->with('success', $message);
        } catch (\Exception $e) {
            Log::error('お気に入りトグル中にエラー ' . $e->getMessage());
            return back()->with('error', 'お気に入りの更新中にエラーが発生しました');
        }
    }
}
