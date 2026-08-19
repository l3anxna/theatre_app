<?php

namespace App\Http\Controllers;

use App\Models\Show;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function toggle(Request $request, Show $show)
    {
        $changes = $request->user()
            ->favoriteShows()
            ->toggle($show->id);

        $message = count($changes['attached']) > 0
            ? 'Added to favorites.'
            : 'Removed from favorites.';

        return back()->with('status', $message);
    }
}