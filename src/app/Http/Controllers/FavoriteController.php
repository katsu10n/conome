<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class FavoriteController extends Controller
{
    public function toggle(Request $request, Category $category)
    {
        $user = Auth::user();
        $toggled = $user->favoriteCategories()->toggle($category->id);

        Cache::forget('sidebar_categories_' . $user->id);

        $action = $toggled['attached'] ? 'お気に入り' : 'お気に入り解除';
        $message = "カテゴリー「{$category->name}」を{$action}しました";

        return back()
            ->withInput(['scroll_to' => $request->input('scroll_position')])
            ->with('success', $message);
    }
}
