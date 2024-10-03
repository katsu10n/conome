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
            ['name' => 'エンタメ', 'slug' => 'entertainment'],
            ['name' => 'ビジネス', 'slug' => 'business'],
            ['name' => 'アート・デザイン', 'slug' => 'art-design'],
            ['name' => 'テクノロジー・ガジェット', 'slug' => 'technology-gadget'],
            ['name' => '趣味・クラフト', 'slug' => 'hobby-craft'],
            ['name' => 'スポーツ・フィットネス', 'slug' => 'sports-fitness'],
            ['name' => '旅行・冒険', 'slug' => 'travel-adventure'],
            ['name' => 'ファッション・ビューティー', 'slug' => 'fashion-beauty'],
            ['name' => 'フード・ドリンク', 'slug' => 'food-drink'],
            ['name' => 'ペット・動物', 'slug' => 'pet-animal'],
            ['name' => '学習・教育', 'slug' => 'learning-education'],
            ['name' => 'その他', 'slug' => 'other'],
        ]);
    }
}
