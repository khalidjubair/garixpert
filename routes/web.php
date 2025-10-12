<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

use App\Http\Controllers\BookingController;
use App\Http\Controllers\PreBookingController;
use App\Http\Controllers\DashboardController;

// Pre-Booking Routes
Route::get('/pre-booking', [PreBookingController::class, 'create'])->name('prebooking.create');
Route::post('/pre-booking', [PreBookingController::class, 'store'])->name('prebooking.store');

// Booking Page Routes
Route::get('/booking', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // New routes for booking lists
    Route::get('/bookings', [DashboardController::class, 'bookings'])->name('bookings.index');
    Route::get('/pre-bookings', [DashboardController::class, 'preBookings'])->name('pre-bookings.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
