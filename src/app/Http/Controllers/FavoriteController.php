<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class FavoriteController extends Controller
{
    public function toggle(Category $category)
    {
        $user = Auth::user();

        $favorite = Favorite::where('user_id', $user->id)
            ->where('category_id', $category->id)
            ->first();

        if ($favorite) {
            $favorite->delete();
        } else {
            Favorite::create([
                'user_id' => $user->id,
                'category_id' => $category->id
            ]);
        }

        Cache::forget('sidebar_categories_' . Auth::id());

        return redirect()->back();
    }
}
