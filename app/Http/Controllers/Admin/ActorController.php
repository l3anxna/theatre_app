<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ActorController extends Controller
{
    public function index()
    {
        $actors = Actor::latest()->get();

        return view('admin.actors.index', compact('actors'));
    }

    public function create()
    {
        return view('admin.actors.create');
    }

    public function store(Request $request)
    {
        Actor::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'biography' => $request->biography,
        ]);

        return redirect('/admin/actors');
    }

    public function edit(Actor $actor)
    {
        return view('admin.actors.edit', compact('actor'));
    }

    public function update(Request $request, Actor $actor)
    {
        $actor->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'biography' => $request->biography,
        ]);

        return redirect('/admin/actors');
    }

    public function destroy(Actor $actor)
    {
        $actor->delete();

        return back();
    }
}