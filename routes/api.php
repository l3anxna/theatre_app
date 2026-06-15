<?php

use Illuminate\Support\Facades\Route;
use App\Models\Show;
use App\Models\Actor;
use App\Models\Venue;

Route::get('/shows', function () {
    return Show::with('venue')->get();
});

Route::get('/actors', function () {
    return Actor::all();
});

Route::get('/venues', function () {
    return Venue::all();
});