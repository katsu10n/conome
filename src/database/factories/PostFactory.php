<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private static int $num = 0;

    public function definition(): array
    {
        self::$num++;

        $createdAt = $this->faker->dateTimeBetween('-2 year', 'now');
        $updatedAt = $this->faker->dateTimeBetween($createdAt, 'now');

        return [
            'user_id' => random_int(1, 20),
            'category_id' => random_int(1, 24),
            'title' => '投稿タイトル' . self::$num,
            'content' => '投稿内容' . self::$num,
            'created_at' => $createdAt,
            'updated_at' => $updatedAt,
        ];
    }
}
