<?php

use App\Http\Controllers\SecretController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('/secrets', [SecretController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('secrets');

Route::get('/secrets/{id}', [SecretController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('secrets.show');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
