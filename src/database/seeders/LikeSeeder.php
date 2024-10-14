<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $posts = Post::all();

        foreach ($posts as $post) {
            $likeCount = rand(0, 5);
            $likers = $users->random($likeCount);

            foreach ($likers as $liker) {
                Like::create([
                    'user_id' => $liker->id,
                    'post_id' => $post->id,
                ]);
            }
        }
    }
}
