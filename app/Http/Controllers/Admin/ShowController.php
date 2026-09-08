<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Models\Venue;
use App\Models\Actor;

class ShowController extends Controller
{
    public function index()
    {
        $shows = Show::with('venue')->latest()->get();

        return view('admin.shows.index', compact('shows'));
    }

    public function create()
    {
        $venues = Venue::orderBy('name')->get();
        $actors = Actor::orderBy('name')->get();

        return view('admin.shows.create', compact('venues', 'actors'));
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);

        $show = Show::create([
            ...Arr::except($data, ['actors']),
            'slug' => $this->uniqueSlug($data['title']),
        ]);

        $show->actors()->sync($data['actors'] ?? []);

        return to_route('admin.shows.index')->with('status', 'Show created successfully.');
    }

    public function edit(Show $show)
    {
        $venues = Venue::orderBy('name')->get();
        $actors = Actor::orderBy('name')->get();

        return view('admin.shows.edit', compact('show', 'venues', 'actors'));
    }

    public function update(Request $request, Show $show)
    {
        $data = $this->validatedData($request);

        $show->update([
            ...Arr::except($data, ['actors']),
            'slug' => $this->uniqueSlug($data['title'], $show->id),
        ]);

        $show->actors()->sync($data['actors'] ?? []);

        return to_route('admin.shows.index')->with('status', 'Show updated successfully.');
    }

    public function destroy(Show $show)
    {
        $show->delete();

        return back()->with('status', 'Show deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'venue_id' => ['nullable', 'exists:venues,id'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'actors' => ['nullable', 'array'],
            'actors.*' => ['integer', 'exists:actors,id'],
        ]);
    }

    private function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title) ?: 'show';
        $slug = $base;
        $suffix = 2;

        while (Show::query()
            ->where('slug', $slug)
            ->when($ignoreId, fn ($query) => $query->whereKeyNot($ignoreId))
            ->exists()) {
            $slug = $base.'-'.$suffix++;
        }

        return $slug;
    }
}
