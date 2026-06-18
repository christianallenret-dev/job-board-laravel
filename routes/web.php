<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\JobController;
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
});

// Authenticated + verified users
Route::middleware(['auth', 'verified'])->group(function () {

    Route::resource('applications', ApplicationController::class)
        ->except(['index', 'destroy']);

    Route::get('/jobs', [JobController::class, 'index'])
        ->name('jobs.index');

    Route::get('/jobs/{job}', [JobController::class, 'show'])
    ->whereNumber('job')
        ->name('jobs.show');

    // Apply to job (USER ACTION)
    Route::post('/jobs/{job}/apply', [JobController::class, 'apply'])
        ->name('jobs.apply');
});

// Admin only
Route::middleware(['auth', 'verified', 'admin'])->group(function () {

    Route::resource('jobs', JobController::class)
        ->except(['index', 'show']);

    Route::resource('applications', ApplicationController::class)
        ->only(['index', 'show', 'destroy']);
});

// Email verification routes
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
