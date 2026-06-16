<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VenuePageController extends Controller
{
    public function show($slug)
    {
        $venue = Venue::with('shows')
            ->where('slug', $slug)
            ->firstOrFail();

        return view(
            'venues.show',
            compact('venue')
        );
    }
}
