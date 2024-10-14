<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FollowSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            $followCount = rand(1, 10);
            $followedUsers = $users->where('id', '!=', $user->id)->random($followCount);

            foreach ($followedUsers as $followedUser) {
                DB::table('follows')->insert([
                    'follower_id' => $user->id,
                    'followed_id' => $followedUser->id,
                ]);
            }
        }
    }
}
