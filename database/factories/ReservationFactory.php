<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Lane;

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
            'user_id' => User::factory(),
            'lane_id' => Lane::factory(),
            'adult_count' => $this->faker->numberBetween(1, 8),
            'child_count' => $this->faker->numberBetween(0, 4),
            'date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'start_time' => $this->faker->dateTimeBetween('now', '+1 month'),
            'end_time' => $this->faker->dateTimeBetween('now', '+1 month'),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'canceled']),
            'is_active' => $this->faker->boolean(),
            'comment' => $this->faker->optional()->sentence(),
        ];
    }
}
