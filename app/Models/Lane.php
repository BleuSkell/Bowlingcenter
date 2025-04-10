<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reservation;

class Lane extends Model
{
    /** @use HasFactory<\Database\Factories\LaneFactory> */
    use HasFactory;

    protected $table = 'lanes';

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'status',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
