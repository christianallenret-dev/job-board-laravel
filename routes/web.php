<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'admin'])->name('dashboard');


// Routes for authenticated users
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('applications', \App\Http\Controllers\ApplicationController::class)->except(['index', 'show', 'destroy']);

    Route::get('/jobs', [\App\Http\Controllers\JobController::class, 'index'])->name('jobs.index');
    Route::get('jobs/{job}', [\App\Http\Controllers\JobController::class, 'show'])->name('jobs.show');
});

// Admin routes
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::resource('jobs', \App\Http\Controllers\JobController::class)->except(['index', 'show']);

    Route::get('/applications', [\App\Http\Controllers\ApplicationController::class, 'index'])->name('applications.index');
    Route::get('/applications/{application}', [\App\Http\Controllers\ApplicationController::class, 'show'])->name('applications.show');
    Route::delete('/applications/{application}', [\App\Http\Controllers\ApplicationController::class, 'destroy'])->name('applications.destroy');    
});

Route::get('/verify-email', EmailVerificationPromptController::class)
    ->middleware('auth')
    ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');



require __DIR__.'/auth.php';
