<?php

use App\Models\Actor;
use App\Models\Show;
use App\Models\Venue;

test('an actor profile is available at its slug URL', function () {
    $actor = Actor::create([
        'name' => 'Ari Patel',
        'slug' => 'ari-patel',
    ]);

    $response = $this->get(route('actors.show', $actor));

    $response->assertOk()->assertSee('Ari Patel');
});

test('a venue profile is available at its slug URL', function () {
    $venue = Venue::create([
        'name' => 'Grand Theatre',
        'slug' => 'grand-theatre',
        'address' => '1 Stage Street',
    ]);

    $response = $this->get(route('venues.show', $venue));

    $response->assertOk()->assertSee('Grand Theatre');
});

test('an upcoming show page includes a booking call to action', function () {
    $show = Show::create([
        'title' => 'Future Production',
        'slug' => 'future-production',
        'description' => 'A future production.',
        'start_date' => today()->addWeek(),
    ]);

    $response = $this->get(route('shows.show', $show->slug));

    $response->assertOk()
        ->assertSee('Book tickets')
        ->assertSee(route('bookings.create', $show), escape: false);
});
