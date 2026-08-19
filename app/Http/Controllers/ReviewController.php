<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Show;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, Show $show)
    {
        $data = $request->validate([
            'rating' => ['required', 'integer', 'between:1,5'],
            'comment' => ['nullable', 'string', 'max:2000'],
        ]);

        $request->user()->reviews()->updateOrCreate(
            ['show_id' => $show->id],
            $data
        );

        return back()->with('status', 'Your review has been saved.');
    }

    public function destroy(Request $request, Review $review)
    {
        abort_unless($review->user_id === $request->user()->id, 403);

        $review->delete();

        return back()->with('status', 'Your review has been deleted.');
    }
}