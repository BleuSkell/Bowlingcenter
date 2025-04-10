<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Reservation;

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
            'reservation_id' => Reservation::factory(),
            'person' => $this->faker->randomName(),
            'score' => $this->faker->numberBetween(1, 300),
            'is_active' => $this->faker->boolean(),
            'comment' => $this->faker->optional()->sentence(),
        ];
    }
}
