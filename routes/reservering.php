<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;

Route::prefix('reservations')->group(function () {
    // Display all reservations
    Route::get('/', [ReservationController::class, 'index'])->name('reservations.index');
    
    // Show the form to create a new reservation
    Route::get('create', [ReservationController::class, 'create'])->name('reservations.create');
    
    // Store a new reservation
    Route::post('/', [ReservationController::class, 'store'])->name('reservations.store');
    
    // Show the form to edit an existing reservation
    Route::get('{reservation}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');
    
    // Update an existing reservation
    Route::put('{reservation}', [ReservationController::class, 'update'])->name('reservations.update');
    
    // Delete a reservation
    Route::delete('{reservation}', [ReservationController::class, 'destroy'])->name('reservations.destroy');
});
