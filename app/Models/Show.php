<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'genre',
        'poster_image',
        'start_date',
        'end_date',
        'venue_id',
    ];

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class)
            ->withPivot('character_name')
            ->withTimestamps();
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites')
            ->withTimestamps();
    }
}