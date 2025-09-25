<?php

use App\Http\Controllers\Admin\SpeakerController;
use App\Http\Controllers\Admin\SponsorController;
use App\Http\Controllers\Admin\ConferenceController;
use App\Http\Controllers\MyConferenceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [\App\Http\Controllers\ConferenceController::class, 'index'])->name('conference.index');
Route::get('/conferences/{conference}', [\App\Http\Controllers\ConferenceController::class, 'show'])->name('conference.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/conferences/{conference}/register', [RegistrationController::class, 'store'])
    ->middleware('auth')->name('conference.register');

Route::delete('/conferences/{conference}/register', [RegistrationController::class, 'destroy'])
    ->middleware('auth')->name('conference.unregister');

Route::middleware('auth')->group(function () {
    Route::get('/my-conferences', [MyConferenceController::class, 'index'])
        ->name('my.conferences');
});

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('speakers', SpeakerController::class);
        Route::resource('sponsors', SponsorController::class);
        Route::resource('conferences', ConferenceController::class);
    });

require __DIR__.'/auth.php';
