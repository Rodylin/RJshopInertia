<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutMeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RecruitmentController;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/about', function() {
    return Inertia::render('About');
})->middleware(['auth', 'verified'])->name('about');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/schedule', [EventController::class, 'index'])->name('schedule');

Route::middleware('auth')->group(function () {
    Route::get('/portfolio', [AboutMeController::class, 'show'])->name('portfolio');
    Route::put('/portfolio/update', [AboutMeController::class, 'update'])->name('about-me.update');
});

// Booking routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/book', [BookingController::class, 'index'])->name('book');
    Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
    Route::delete('/bookings/{booking}', [BookingController::class, 'destroy']);
    Route::resource('/booking', BookingController::class);
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/recruitment', [RecruitmentController::class, 'index'])->name('recruitment.index');
    Route::get('/recruitment/create', [RecruitmentController::class, 'create'])->name('recruitment.create');
    Route::post('/recruitment', [RecruitmentController::class, 'store'])->name('recruitment.store');
});

require __DIR__.'/auth.php';
