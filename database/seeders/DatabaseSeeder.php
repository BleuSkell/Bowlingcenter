<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Reservation;
use App\Models\Lane;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 1 test user
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Create 5 lanes
        $lanes = Lane::factory(5)->create();

        // Create 10 reservations linked to the test user and random lanes
        Reservation::factory(10)->create([
            'user_id' => $user->id,
            'lane_id' => $lanes->random()->id, // assign random lane
        ]);

        // Optionally create more users and reservations
        User::factory(5)->create()->each(function ($user) use ($lanes) {
            Reservation::factory(2)->create([
                'user_id' => $user->id,
                'lane_id' => $lanes->random()->id,
            ]);
        });
    }
}
