<?php

namespace Database\Factories;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Score>
 */
class ScoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reservation_id' => Reservation::factory()->create()->id,
            'person' => fake()->name(),
            'score' => fake()->numberBetween(1, 300),
            'is_active' => fake()->boolean(),
            'comment' => fake()->optional()->sentence(),
        ];
    }
}