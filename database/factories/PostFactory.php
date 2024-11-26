<?php

namespace Database\Factories;

use App\Models\Category;
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
        $categories = Category::count();

        return [
            //
            'category_id' => $this->faker->numberBetween(1, $categories),
            'title' => $this->faker->name(),
            'url_clean' => str::random(20),
            'content' => str::random(100),
            'posted' => $this->faker->randomElement(['yes','no'],)
        ];
    }
}
