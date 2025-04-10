<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory()->create()->id,
            'reservation_id' => Reservation::factory()->create()->id,
            'quantity' => fake()->numberBetween(1, 10),
            'total_price' => fake()->randomFloat(2, 10, 100),
            'status' => fake()->randomElement(['pending', 'completed', 'canceled']),
            'is_active' => fake()->boolean(),
            'comment' => fake()->optional()->sentence(),
        ];
    }
}