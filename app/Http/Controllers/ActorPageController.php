<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActorPageController extends Controller
{
    public function show($slug)
    {
        $actor = Actor::with('shows')
            ->where('slug', $slug)
            ->firstOrFail();

        return view(
            'actors.show',
            compact('actor')
        );
    }
}
