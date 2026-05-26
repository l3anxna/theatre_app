<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Show;

class ShowSeeder extends Seeder
{
    public function run(): void
    {
        Show::create([
            'title' => 'Romeo and Juliet',
            'slug' => 'romeo-and-juliet',
            'description' => 'Classic theatre show',
        ]);

        Show::create([
            'title' => 'Hamlet',
            'slug' => 'hamlet',
            'description' => 'Shakespeare tragedy',
        ]);
    }
}