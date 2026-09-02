<?php

namespace App\Http\Controllers;

use App\Models\Show;
use Illuminate\Http\Request;

class ShowPageController extends Controller
{
    public function index(Request $request)
    {
        $shows = Show::query()
            ->with('venue')
            ->withCount('reviews')
            ->withAvg('reviews', 'rating')
            ->where(function ($query) {
                $query->whereNull('end_date')
                    ->orWhereDate('end_date', '>=', today());
            })
            ->when($request->filled('q'), function ($query) use ($request) {
                $term = '%' . $request->string('q')->trim() . '%';

                $query->where(function ($query) use ($term) {
                    $query->where('title', 'like', $term)
                        ->orWhereHas('venue', fn ($venue) => $venue->where('name', 'like', $term))
                        ->orWhereHas('actors', fn ($actor) => $actor->where('name', 'like', $term));
                });
            })
            ->when($request->filled('genre'), fn ($query) => $query->where('genre', $request->string('genre')->trim()))
            ->orderByRaw('start_date is null')
            ->orderBy('start_date')
            ->paginate(12)
            ->withQueryString();

        $genres = Show::query()
            ->whereNotNull('genre')
            ->distinct()
            ->orderBy('genre')
            ->pluck('genre');

        return view('shows.index', compact('shows', 'genres'));
    }

    public function show(string $slug)
    {
        $show = Show::with([
            'venue',
            'actors',
            'reviews' => fn ($query) => $query->with('user')->latest(),
        ])
            ->withCount('reviews')
            ->withAvg('reviews', 'rating')
            ->where('slug', $slug)
            ->firstOrFail();

        $show->is_favorited = auth()->check()
            && auth()->user()
                ->favoriteShows()
                ->where('shows.id', $show->id)
                ->exists();

        return view('shows.show', compact('show'));
    }
}
