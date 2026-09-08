<?php

namespace App\Http\Controllers;

use App\Models\Actor;

class ActorPageController extends Controller
{
    public function index()
    {
        $actors = Actor::with('shows')->get();

        return view('actors.index', compact('actors'));
    }

    public function show(Actor $actor)
    {
        $actor->load('shows');

        return view('actors.show', compact('actor'));
    }
}
