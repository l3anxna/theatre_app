<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VenueController extends Controller
{
    public function index()
    {
        $venues = Venue::latest()->get();

        return view('admin.venues.index', compact('venues'));
    }

    public function create()
    {
        return view('admin.venues.create');
    }

    public function store(Request $request)
    {
        Venue::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'address' => $request->address,
            'google_map_link' => $request->google_map_link,
            'description' => $request->description,
        ]);

        return redirect('/admin/venues');
    }

    public function edit(Venue $venue)
    {
        return view('admin.venues.edit', compact('venue'));
    }

    public function update(Request $request, Venue $venue)
    {
        $venue->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'address' => $request->address,
            'google_map_link' => $request->google_map_link,
            'description' => $request->description,
        ]);

        return redirect('/admin/venues');
    }

    public function destroy(Venue $venue)
    {
        $venue->delete();

        return back();
    }
}