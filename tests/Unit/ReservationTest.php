<?php

namespace Tests\Unit;

use App\Models\Reservation;
use App\Models\User;
use App\Models\Lane;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReservationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that a reservation can be created with a user and lane.
     */
    public function test_reservation_can_be_created_with_user_and_lane()
    {
        // Create a user and a lane
        $user = User::factory()->create();
        $lane = Lane::factory()->create();

        // Create the reservation with factory
        $reservation = Reservation::factory()->create([
            'user_id' => $user->id,
            'lane_id' => $lane->id,
        ]);

        // Assert that the reservation exists in the database
        $this->assertDatabaseHas('reservations', [
            'user_id' => $user->id,
            'lane_id' => $lane->id,
            'adult_count' => $reservation->adult_count,
            'child_count' => $reservation->child_count,
            'price' => $reservation->price,
            'status' => $reservation->status,
            'is_active' => $reservation->is_active,
        ]);
    }

    /**
     * Test that the reservation status can be set to a valid value.
     */
    public function test_reservation_status_can_be_set()
    {
        $reservation = Reservation::factory()->create();

        $validStatuses = ['pending', 'confirmed', 'canceled'];
        $this->assertContains($reservation->status, $validStatuses);
    }
}
