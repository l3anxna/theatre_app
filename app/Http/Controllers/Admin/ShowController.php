<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShowController extends Controller
{
    public function index()
    {
        $shows = Show::latest()->get();

        return view('admin.shows.index', compact('shows'));
    }

    public function create()
    {
        return view('admin.shows.create');
    }

    public function store(Request $request)
    {
        Show::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
        ]);

        return redirect('/admin/shows');
    }

    public function edit(Show $show)
    {
        return view('admin.shows.edit', compact('show'));
    }

    public function update(Request $request, Show $show)
    {
        $show->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
        ]);

        return redirect('/admin/shows');
    }

    public function destroy(Show $show)
    {
        $show->delete();

        return back();
    }
}