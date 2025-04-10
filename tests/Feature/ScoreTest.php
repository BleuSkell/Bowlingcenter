<?php

use App\Models\Score;
use App\Models\Reservation;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

// index
test('reservations kunnen worden bekeken', function() {
    $reservations = Reservation::factory(5)->create()->each(function ($reservation) {
                    // Create 2 scores for each reservation
                    Score::factory(2)->create([
                        'reservation_id' => $reservation->id,
                    ]);
                });

    $response = $this->get(route('scores.index')); // voer een get verzoek naar de route

    $response->assertStatus(200); // controleer of de pagina juist laadt (HTTP 200 OK)
    $response->assertViewIs('scores.index'); // controleer of de juiste blade view wordt geladen
    $response->assertViewHas('reservations', function ($viewReservations) use ($reservations) {
        return $viewReservations->contains($reservations->first()); // controleer of ten minste 1 van de aangemaakte producten in de view aanwezig is
    });
});

// show
test('een reservation toont zijn gekoppelde scores op de show pagina', function () {
    // Arrange
    $reservation = Reservation::factory()->create();
    $scores = Score::factory(3)->create([
        'reservation_id' => $reservation->id,
    ]);

    // Act
    $response = $this->get(route('scores.show', $reservation->id));

    // Assert
    $response->assertStatus(200);
    $response->assertViewIs('scores.show');
    $response->assertViewHas('scores', function ($viewScores) use ($scores) {
        return $scores->every(fn($score) => $viewScores->contains($score));
    });

    // Optioneel: controleer dat score-gegevens zichtbaar zijn in HTML
    $response->assertSeeText($scores->first()->comment ?? '');  // Controleer of het comment zichtbaar is
});

// create
test('een score kan worden toegevoegd aan een reservation', function () {
    // Arrange
    $reservation = Reservation::factory()->create();

    $data = [
        'person' => 2,
        'score' => 4,
        'comment' => 'Prima service!',
    ];

    // Act
    $response = $this->post(route('scores.store', $reservation->id), $data);

    // Assert
    $response->assertRedirect(route('scores.show', $reservation->id));
    $this->assertDatabaseHas('scores', array_merge($data, [
        'reservation_id' => $reservation->id,
    ]));
});

// edit
test('een score kan worden aangepast', function () {
    $score = Score::factory()->create([
        'person' => 1,
        'score' => 3,
        'comment' => 'Oke',
    ]);

    $newData = [
        'person' => 2,
        'score' => 5,
        'comment' => 'Geweldig!',
    ];

    $response = $this->patch(route('scores.update', $score->id), $newData);

    $response->assertRedirect(route('scores.show', $score->reservation_id));
    $this->assertDatabaseHas('scores', array_merge($newData, [
        'id' => $score->id,
    ]));
});

// delete
test('een score kan worden verwijderd', function () {
    $score = Score::factory()->create();

    $response = $this->delete(route('scores.destroy', $score->id));

    $response->assertRedirect(route('scores.show', $score->reservation_id));
    $this->assertDatabaseMissing('scores', ['id' => $score->id]);
});
