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

    public function show($slug)
    {
        $venue = Venue::with('shows')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('venues.show', compact('venue'));
    }
}