<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'id' => 99991,
                'user_id' => 1,
                'category_id' => 1,
                'title' => 'テストユーザー1の投稿1',
                'content' => 'テストユーザー1の投稿内容1',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'id' => 99992,
                'user_id' => 1,
                'category_id' => 1,
                'title' => 'テストユーザー1の投稿2',
                'content' => 'テストユーザー1の投稿内容2',
                'created_at' => Carbon::now()->subMinutes(30)->toDateTimeString(),
                'updated_at' => Carbon::now()->subMinutes(30)->toDateTimeString(),
            ],
            [
                'id' => 99993,
                'user_id' => 1,
                'category_id' => 1,
                'title' => 'テストユーザー1の投稿3',
                'content' => 'テストユーザー1の投稿内容3',
                'created_at' => Carbon::now()->subHours(2)->toDateTimeString(),
                'updated_at' => Carbon::now()->subHours(2)->toDateTimeString(),
            ],
        ]);
    }
}
