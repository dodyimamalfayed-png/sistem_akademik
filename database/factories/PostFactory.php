<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\User;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // otomatis buat user kalau belum ada
            'title'   => $this->faker->sentence,
            'body'    => $this->faker->paragraph,
        ];
    }
}
