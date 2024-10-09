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
            ['name' => '音楽', 'slug' => 'music'],
            ['name' => 'アニメ', 'slug' => 'anime'],
            ['name' => '漫画', 'slug' => 'manga'],
            ['name' => '小説', 'slug' => 'novel'],
            ['name' => 'イラスト', 'slug' => 'illustration'],
            ['name' => 'ゲーム', 'slug' => 'game'],
            ['name' => '動画', 'slug' => 'video'],
            ['name' => 'アート・デザイン', 'slug' => 'art-design'],
            ['name' => 'VTuber・ストリーマー', 'slug' => 'vtuber-streamer'],
            ['name' => '芸能人・声優・アイドル', 'slug' => 'performer'],
            ['name' => '学問', 'slug' => 'study'],
            ['name' => 'ガジェット', 'slug' => 'gadget'],
            ['name' => 'テクノロジー', 'slug' => 'technology'],
            ['name' => 'コレクション', 'slug' => 'collection'],
            ['name' => '手芸・工芸', 'slug' => 'handicraft'],
            ['name' => '植物・ガーデニング', 'slug' => 'plants-gardening'],
            ['name' => '乗り物', 'slug' => 'vehicles'],
            ['name' => 'DIY', 'slug' => 'diy'],
            ['name' => '旅行', 'slug' => 'travel'],
            ['name' => 'スポーツ・フィットネス', 'slug' => 'sports-fitness'],
            ['name' => 'ファッション・美容', 'slug' => 'fashion-beauty'],
            ['name' => 'フード・ドリンク', 'slug' => 'food-drink'],
            ['name' => '動物・生き物', 'slug' => 'animals'],
            ['name' => 'その他', 'slug' => 'other'],
        ]);
    }
}
