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
            'title' => $title,
            'slug' => Str::slug($title, '-'),
            'content' => $this->faker->realText(1000),
            'category_id' => $this->faker->numberBetween(1, 10),
            'description' => $this->faker->realText(200),
        ];
    }
}
