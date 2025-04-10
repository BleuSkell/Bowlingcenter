<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reservation;

class Score extends Model
{
    /** @use HasFactory<\Database\Factories\ScoreFactory> */
    use HasFactory;

    protected $table = 'scores';

    protected $fillable = [
        'reservation_id',
        'person',
        'score',
        'comment',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
