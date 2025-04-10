<?php

namespace Database\Factories;

use App\Models\Lane;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create()->id,
            'lane_id' => Lane::factory()->create()->id,
            'adult_count' => fake()->numberBetween(1, 8),
            'child_count' => fake()->numberBetween(0, 4),
            'date' => fake()->dateTimeBetween('now', '+1 month'),
            'start_time' => fake()->dateTimeBetween('now', '+1 month'),
            'end_time' => fake()->dateTimeBetween('now', '+1 month'),
            'price' => fake()->randomFloat(2, 10, 100),
            'status' => fake()->randomElement(['pending', 'confirmed', 'canceled']),
            'is_active' => fake()->boolean(),
            'comment' => fake()->optional()->sentence(),
        ];
    }
}