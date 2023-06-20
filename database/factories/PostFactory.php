<?php

namespace Database\Factories;

use App\Models\Category;
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
    public function definition(): array
    {
        return [
            'heading' => $this->faker->sentence(),
            'sub_heading' => $this->faker->sentence(),
            'slug' => $this->faker->unique()->slug(),
            'thumbnail' => fake()->randomElement(['https://images.pexels.com/photos/5412436/pexels-photo-5412436.jpeg', 'https://images.pexels.com/photos/1366944/pexels-photo-1366944.jpeg', 'https://images.pexels.com/photos/1771338/pexels-photo-1771338.jpeg']),
            'category_id' => Category::factory(),
            'keywords' => $this->faker->word(),
            'text_content' => '<p>' . implode('</p><p>', $this->faker->paragraphs(6)) . '</p>',
            'status' => $this->faker->randomElement(['published', 'draft']),

        ];
    }
}
