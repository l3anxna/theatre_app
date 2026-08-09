<?php

namespace App\Http\Controllers;

use App\Models\Booking;

class BookingPageController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['show.venue'])->get();

        return view('bookings.index', compact('bookings'));
    }

    public function show(Booking $booking)
    {
        $booking->load(['show.venue']);

        return view('bookings.show', compact('booking'));
    }
}