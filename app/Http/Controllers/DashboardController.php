<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function bookings()
    {
        $bookings = Booking::where('type', 'booking')
            ->with(['customer', 'car.make', 'car.model']) // Eager load relationships
            ->latest('booking_date')
            ->paginate(15);
            
        return view('booking.index', compact('bookings'));
    }

    public function preBookings()
    {
        $preBookings = Booking::where('type', 'pre-booking')
            ->with(['customer', 'car.make', 'car.model']) // Eager load relationships
            ->latest()
            ->paginate(15);

        return view('pre-booking.index', compact('preBookings'));
    }
}