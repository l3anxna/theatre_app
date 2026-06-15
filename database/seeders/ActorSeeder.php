<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Actor;

class ActorSeeder extends Seeder
{
    public function run(): void
    {
        Actor::create([
            'name' => 'Mario Maurer',
            'slug' => 'mario-maurer',
            'biography' => 'Thai actor and performer.',
            'profile_image' => null,
        ]);

        Actor::create([
            'name' => 'Davika Hoorne',
            'slug' => 'davika-hoorne',
            'biography' => 'Thai actress and theatre performer.',
            'profile_image' => null,
        ]);

        Actor::create([
            'name' => 'Thanapob Leeratanakachorn',
            'slug' => 'thanapob-leeratanakachorn',
            'biography' => 'Thai actor known for stage and screen performances.',
            'profile_image' => null,
        ]);
    }
}