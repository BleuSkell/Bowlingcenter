<?php

use App\Models\Score;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('a score can be created', function () {
    // Arrange: Maak een score aan met de factory
    $score = Score::factory()->create([
        'reservation_id' => 1,
        'person' => 'John Doe',
        'score' => 150,
        'is_active' => true,
        'comment' => 'Great game!',
    ]);

    // Assert: Controleer of de score correct is opgeslagen
    $this->assertDatabaseHas('scores', [
        'reservation_id' => 1,
        'person' => 'John Doe',
        'score' => 150,
        'is_active' => true,
        'comment' => 'Great game!',
    ]);
});