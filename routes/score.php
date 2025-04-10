<?php

use App\Http\Controllers\ScoreController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\IsWorker;

Route::middleware('auth')->group(function () {
    Route::get('/scores', [ScoreController::class, 'index'])->name('scores.index');
    Route::get('/scores/{id}', [ScoreController::class, 'show'])->name('scores.show');
    Route::get('/scores/create/{reservationId}', [ScoreController::class, 'create'])->name('scores.create')->middleware(IsWorker::class);
    Route::post('/scores/store/{reservationId}', [ScoreController::class, 'store'])->name('scores.store')->middleware(IsWorker::class);
    Route::get('/scores/edit/{id}', [ScoreController::class, 'edit'])->name('scores.edit')->middleware(IsWorker::class);
    Route::patch('/scores/update/{id}', [ScoreController::class, 'update'])->name('scores.update')->middleware(IsWorker::class);
    Route::delete('/scores/destroy/{id}', [ScoreController::class, 'destroy'])->name('scores.destroy');
});