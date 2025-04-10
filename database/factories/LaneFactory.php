<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lane>
 */
class LaneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lane_number' => $this->faker->unique()->numberBetween(1, 8),
            'lane_type' => $this->faker->boolean(),
            'is_available' => $this->faker->boolean(),
            'is_active' => $this->faker->boolean(),
            'comment' => $this->faker->optional()->sentence(),
        ];
    }
}
