<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use Faker\Generator as Faker;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //テストデータ作成
            'created_at' => $this->faker->date('Y-m-d H:i:s', 'now'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s', 'now'),
            'post' => $this->faker->realText(20), // 20文字のテキスト
            'user_id' => \App\Models\User::factory()->create()->id, // 適切なユーザーIDを生成
            'name' => $this->faker->name,
        ];
    }

}
