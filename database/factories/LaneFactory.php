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
        static $laneNumber = 1;

        return [
            'lane_number' => $laneNumber++,
            'lane_type' => fake()->boolean(),
            'is_available' => fake()->boolean(),
            'is_active' => fake()->boolean(),
            'comment' => fake()->optional()->sentence(),
        ];
    }
}