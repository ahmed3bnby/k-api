<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DataController::class, 'index'])->name('dashboard');
    Route::get('/create', [DataController::class, 'create'])->name('create');
    Route::post('/store', [DataController::class, 'store'])->name('data.store');
    Route::delete('/dashboard/{id}', [DataController::class, 'destroy'])->name('destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
