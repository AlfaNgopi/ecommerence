<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductVariantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
    return [
        'name' => fake()->randomElement(['Small', 'Medium', 'Large', 'Red', 'Blue']),
        'price' => fake()->randomFloat(2, 10, 500),
        'stock_quantity' => fake()->numberBetween(0, 100),
        'display' => true,
    ];
}
}
