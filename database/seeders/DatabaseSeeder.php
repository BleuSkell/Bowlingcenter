<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Lane;
use App\Models\Order;
use App\Models\Product;
use App\Models\Reservation;
use App\Models\Score;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Lane::factory(8)->create();
        Product::factory(10)->create();
        Order::factory(10)->create();
        Reservation::factory(10)->create();
        Score::factory(10)->create();
        Contact::factory(10)->create();
    }
}