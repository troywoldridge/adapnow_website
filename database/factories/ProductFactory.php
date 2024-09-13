<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category; // Assuming Category is related to Product

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'slug' => $this->faker->slug,
            'category_id' => Category::factory(),  // Generates a related category
            'sku' => strtoupper($this->faker->unique()->bothify('??-#####')),
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 5, 100), // Random price between $5 and $100
        ];
    }
}
