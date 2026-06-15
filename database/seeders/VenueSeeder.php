<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Venue;

class VenueSeeder extends Seeder
{
    public function run(): void
    {
        Venue::create([
            'name' => 'M Theatre',
            'slug' => 'm-theatre',
            'address' => '2884/2 New Petchburi Rd, Bangkok',
            'google_map_link' => 'https://maps.google.com',
            'description' => 'One of Bangkok’s most popular theatre venues.',
        ]);

        Venue::create([
            'name' => 'Thailand Cultural Centre',
            'slug' => 'thailand-cultural-centre',
            'address' => 'Huai Khwang, Bangkok',
            'google_map_link' => 'https://maps.google.com',
            'description' => 'Major venue for performing arts and theatre.',
        ]);

        Venue::create([
            'name' => 'KBank Siam Pic-Ganesha',
            'slug' => 'kbank-siam-pic-ganesha',
            'address' => 'Siam Square One, Bangkok',
            'google_map_link' => 'https://maps.google.com',
            'description' => 'Popular theatre and event venue in central Bangkok.',
        ]);
    }
}