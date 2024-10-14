<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Favorite;
use Illuminate\Database\Seeder;

class FavoriteSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $categories = Category::all();

        foreach ($users as $user) {
            $favoriteCount = rand(1, 5);
            $favoriteCategories = $categories->random($favoriteCount);

            foreach ($favoriteCategories as $category) {
                Favorite::create([
                    'user_id' => $user->id,
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}
