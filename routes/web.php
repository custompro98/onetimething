<?php

use App\Http\Controllers\SecretController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('/secrets', [SecretController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('secrets.index');

Route::get('/secrets/{slug}', [SecretController::class, 'show'])
    ->name('secrets.show');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
