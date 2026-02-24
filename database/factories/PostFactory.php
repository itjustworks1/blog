<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition(): array
    {
        $title = $this->faker->realText(20);
        return [
            "title" => $title,
            "description" => $this->faker->realText(250),
            "content" => $this->faker->realText(1000),
            "slug" => Str::slug($title, '-'),
            "category_id" => $this->faker->numberBetween(1, 10),
            "user_id" => $this->faker->numberBetween(1, 10),
        ];
    }
}
