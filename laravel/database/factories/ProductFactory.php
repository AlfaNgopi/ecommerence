<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // ProductFactory
    public function definition(): array
    {
        return [
            'name' => fake()->words(3, true),
            'description' => fake()->paragraph(),
            'image_url' => fake()->imageUrl(640, 480, 'technics'),
            'display' => true,
            'store_id' => \App\Models\Store::factory(),
            'category_id' => \App\Models\ProductCategory::factory(),
        ];
    }

    
}
