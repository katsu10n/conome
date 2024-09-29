<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'id' => 99999,
                'user_id' => 2,
                'category_id' => 1,
                'title' => 'ユーザー２の投稿',
                'content' => 'ユーザー２の投稿内容',
            ],
        ]);
    }
}
