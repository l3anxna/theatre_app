<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actor;

class ActorPageController extends Controller
{
    public function index()
    {
        $actors = Actor::with('shows')->get();

        return view('actors.index', compact('actors'));
    }

    public function show($slug)
    {
        $actor = Actor::with('shows')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('actors.show',compact('actor'));
    }
}