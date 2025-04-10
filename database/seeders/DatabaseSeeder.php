<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Score;
use App\Models\Reservation;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Reservation::factory(5)->create()->each(function ($reservation) {
            // Create 2 scores for each reservation
            Score::factory(2)->create([
                'reservation_id' => $reservation->id,
            ]);
        });
    }
}
