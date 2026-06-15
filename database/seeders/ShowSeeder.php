<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Venue;
use App\Models\Show;

class ShowSeeder extends Seeder
{
    public function run(): void
    {
        $mTheatre = Venue::where('slug', 'm-theatre')->first();

        $tcc = Venue::where('slug', 'thailand-cultural-centre')->first();

        Show::create([
            'title' => 'Romeo and Juliet',
            'slug' => 'romeo-and-juliet',
            'description' => 'Classic theatre show',
            'venue_id' => $mTheatre?->id,
        ]);

        Show::create([
            'title' => 'Hamlet',
            'slug' => 'hamlet',
            'description' => 'Shakespeare tragedy',
            'venue_id' => $tcc?->id,
        ]);
    }
}