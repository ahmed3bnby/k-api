<?php

use App\Http\Controllers\API\DataControllerApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', [DataControllerApi::class, 'index'])->name('dashboard');
    Route::get('/create', [DataControllerApi::class, 'create'])->name('create');
    Route::post('/store', [DataControllerApi::class, 'store'])->name('data.store');
    Route::delete('/dashboard/{id}', [DataControllerApi::class, 'destroy'])->name('destroy');
});
