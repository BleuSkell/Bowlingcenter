<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;

Route::resource('reservations', ReservationController::class);
