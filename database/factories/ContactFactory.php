<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
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
            'first_name' => $this->faker->firstName(),
            'middle_name' => $this->faker->optional()->firstName(),
            'last_name' => $this->faker->lastName(),
            'phone_number' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'is_active' => $this->faker->boolean(),
            'comment' => $this->faker->optional()->sentence(),
        ];
    }
}
