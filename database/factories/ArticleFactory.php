<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "slug" => fake()->slug(),
            "title" => fake()->sentence(),
            "user_id" => User::factory()->create()->id,
            "category_id" => Category::factory()->create()->id,
            "content" => fake()->paragraph(),
        ];
    }
}
