<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
        ]);

        User::factory(20)->create();
        Post::factory(200)->create();

        $this->call([
            FollowSeeder::class,
            PostSeeder::class,
            FavoriteSeeder::class,
            LikeSeeder::class,
            CommentSeeder::class,
        ]);
    }
}
