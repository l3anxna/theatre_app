<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'biography',
        'profile_image',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function shows()
    {
        return $this->belongsToMany(Show::class)
            ->withPivot('character_name')
            ->withTimestamps();
    }
}
