<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

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
            $isFavorited = false;
        } else {
            Favorite::create([
                'user_id' => $user->id,
                'category_id' => $category->id
            ]);
            $isFavorited = true;
        }

        return response()->json(['isFavorited' => $isFavorited]);
    }
}
