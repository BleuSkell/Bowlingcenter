<?php

use App\Http\Controllers\ScoreController;
use Illuminate\Support\Facades\Route;

Route::get('/score', [ScoreController::class, 'index'])->name('score.index');
Route::get('/score/{id}', [ScoreController::class, 'show'])->name('score.show');
Route::get('/score/create/{reservationId}', [ScoreController::class, 'create'])->name('score.create');
Route::post('/score/store/{reservationId}', [ScoreController::class, 'store'])->name('score.store');
Route::get('/score/edit/{id}', [ScoreController::class, 'edit'])->name('score.edit');
Route::patch('/score/update/{id}', [ScoreController::class, 'update'])->name('score.update');
Route::delete('/score/destroy/{id}', [ScoreController::class, 'destroy'])->name('score.destroy');