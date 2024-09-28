<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'エンタメ'],
            ['name' => 'アート・デザイン'],
            ['name' => 'テクノロジー・ガジェット'],
            ['name' => '趣味・クラフト'],
            ['name' => 'スポーツ・フィットネス'],
            ['name' => '旅行・冒険'],
            ['name' => 'ファッション・ビューティー'],
            ['name' => 'フード・ドリンク'],
            ['name' => 'ペット・動物'],
            ['name' => '学習・教育'],
            ['name' => 'その他'],
        ]);
    }
}
