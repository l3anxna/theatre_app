<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Show;
use App\Services\PaymentProcessor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingPageController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['show.venue'])->get();

        return view('bookings.index', compact('bookings'));
    }

    public function create(Show $show)
    {
        $show->load('venue');

        return view('bookings.create', compact('show'));
    }

    public function store(Request $request, Show $show, PaymentProcessor $paymentProcessor)
    {
        $validated = $request->validate([
            'customer_name' => ['required', 'string', 'max:255'],
            'customer_email' => ['required', 'email', 'max:255'],
            'tickets' => ['required', 'integer', 'min:1', 'max:10'],
            'seat_number' => ['required', 'integer', 'min:1'],
            'payment_method' => ['required', 'in:card'],
        ]);

        $booking = DB::transaction(function () use ($show, $validated, $paymentProcessor) {
            $payment = $paymentProcessor->charge($validated['tickets']);

            return Booking::create([
                'show_id' => $show->id,
                'customer_name' => $validated['customer_name'],
                'customer_email' => $validated['customer_email'],
                'tickets' => $validated['tickets'],
                'seat_number' => $validated['seat_number'],
                'payment_status' => $payment['status'],
                'payment_reference' => $payment['reference'],
            ]);
        });

        return to_route('bookings.show', $booking)
            ->with('status', 'Payment received and your booking is confirmed.');
    }

    public function show(Booking $booking)
    {
        $booking->load(['show.venue']);

        return view('bookings.show', compact('booking'));
    }
}
