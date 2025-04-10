<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Lane;
use App\Models\Order;
use App\Models\Score;

class Reservation extends Model
{
    /** @use HasFactory<\Database\Factories\ReservationFactory> */
    use HasFactory;

    protected $table = 'reservations';

    protected $fillable = [
        'user_id',
        'lane_id',
        'adult_count',
        'child_count',
        'date',
        'start_time',
        'end_time',
        'price',
        'status',
        'is_active',
        'comment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lane()
    {
        return $this->belongsTo(Lane::class);
    }


    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function score()
    {
        return $this->hasMany(Score::class);
    }
}
