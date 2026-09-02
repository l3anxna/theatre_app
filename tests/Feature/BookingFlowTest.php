<?php

use App\Models\Show;

test('a visitor can complete a ticket booking and receive confirmation', function () {
    $show = Show::create([
        'title' => 'The Glass Menagerie',
        'slug' => 'the-glass-menagerie',
        'description' => 'A moving classic.',
        'start_date' => today()->addWeek(),
    ]);

    $this->get(route('bookings.create', $show))
        ->assertOk()
        ->assertSee('Complete your booking')
        ->assertSee($show->title);

    $response = $this->post(route('bookings.store', $show), [
        'customer_name' => 'Maya Chen',
        'customer_email' => 'maya@example.com',
        'tickets' => 2,
        'seat_number' => 12,
        'payment_method' => 'card',
    ]);

    $booking = $show->bookings()->sole();

    $response->assertRedirect(route('bookings.show', $booking))
        ->assertSessionHas('status', 'Payment received and your booking is confirmed.');

    $this->assertDatabaseHas('bookings', [
        'id' => $booking->id,
        'customer_name' => 'Maya Chen',
        'customer_email' => 'maya@example.com',
        'tickets' => 2,
        'payment_status' => 'paid',
    ]);

    expect($booking->payment_reference)->toStartWith('PAY-');
});
