<?php

namespace App\Http\Controllers;

use App\Models\Venue;

class VenuePageController extends Controller
{
    public function index()
    {
        $venues = Venue::with('shows')->get();

        return view('venues.index', compact('venues'));
    }

    public function show(Venue $venue)
    {
        $venue->load('shows');

        return view('venues.show', compact('venue'));
    }
}
