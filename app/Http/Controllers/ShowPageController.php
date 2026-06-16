<?php

namespace App\Http\Controllers;

use App\Models\Show;

class ShowPageController extends Controller
{
    public function index()
    {
        $shows = Show::with('venue')
            ->latest()
            ->get();

        return view('shows.index', compact('shows'));
    }

    public function show($slug)
    {
        $show = Show::with([
            'venue',
            'actors'
        ])->where('slug', $slug)
          ->firstOrFail();

        return view('shows.show', compact('show'));
    }
}