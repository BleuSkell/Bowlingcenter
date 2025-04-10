<?php

use App\Http\Controllers\ScoreController;
use Illuminate\Support\Facades\Route;

Route::get('/scores', [ScoreController::class, 'index'])->name('scores.index');
Route::get('/scores/{id}', [ScoreController::class, 'show'])->name('scores.show');
Route::get('/scores/create/{reservationId}', [ScoreController::class, 'create'])->name('scores.create');
Route::post('/scores/store/{reservationId}', [ScoreController::class, 'store'])->name('scores.store');
Route::get('/scores/edit/{id}', [ScoreController::class, 'edit'])->name('scores.edit');
Route::patch('/scores/update/{id}', [ScoreController::class, 'update'])->name('scores.update');
Route::delete('/scores/destroy/{id}', [ScoreController::class, 'destroy'])->name('scores.destroy');