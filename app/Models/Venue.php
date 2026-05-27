<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'address',
        'google_map_link',
        'description',
    ];

    public function shows()
    {
        return $this->hasMany(Show::class);
    }
}