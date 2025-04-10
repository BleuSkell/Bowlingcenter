<?php

use App\Models\Score;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('Een score kan worden aangemaakt', function () {
    // Arrange: Maak een nieuwe score aan met de factory
    $score = Score::factory()->create([
        'reservation_id' => 1,
        'person' => 'Jane Doe',
        'score' => 200,
        'is_active' => true,
        'comment' => 'Fantastisch spel!',
    ]);

    // Assert: Controleer of de score correct in de database is opgeslagen
    $this->assertDatabaseHas('scores', [
        'reservation_id' => 1,
        'person' => 'Jane Doe',
        'score' => 200,
        'is_active' => true,
        'comment' => 'Fantastisch spel!',
    ]);
});