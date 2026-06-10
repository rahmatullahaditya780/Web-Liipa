<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->words(3, true);

        return [
            'name' => Str::title($name),
            'slug' => Str::slug($name),
            'description' => fake()->sentence(10),
            'price' => fake()->numberBetween(10, 500) * 1000,
            'rating' => fake()->randomFloat(1, 3, 5),
            'color_variants_count' => fake()->numberBetween(1, 5),
            'is_featured' => false,
            'category_id' => Category::factory(),
        ];
    }

    public function featured(): static
    {
        return $this->state(['is_featured' => true]);
    }
}
