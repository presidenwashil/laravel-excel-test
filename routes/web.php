<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('students', [StudentController::class, 'index'])
    ->middleware(['auth'])
    ->name('students');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
