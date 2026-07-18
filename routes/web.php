<?php

use App\Http\Controllers\Admin\ActorController;
use App\Http\Controllers\Admin\ShowController;
use App\Http\Controllers\Admin\VenueController;

use App\Http\Controllers\ActorPageController;
use App\Http\Controllers\ShowPageController;
use App\Http\Controllers\VenuePageController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Website
|--------------------------------------------------------------------------
*/

// Home Page
Route::get('/', [ShowPageController::class, 'index'])
    ->name('home');

// Shows
Route::get('/shows', [ShowPageController::class, 'index'])
    ->name('shows.index');

Route::get('/shows/{slug}', [ShowPageController::class, 'show'])
    ->name('shows.show');

// Actors
Route::get('/actors', [ActorPageController::class, 'index'])
    ->name('actors.index');

Route::get('/actors/{slug}', [ActorPageController::class, 'show'])
    ->name('actors.show');

// Venues
Route::get('/venues', [VenuePageController::class, 'index'])
    ->name('venues.index');

Route::get('/venues/{slug}', [VenuePageController::class, 'show'])
    ->name('venues.show');


/*
|--------------------------------------------------------------------------
| Admin Dashboard
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::resource('shows', ShowController::class);

        Route::resource('actors', ActorController::class);

        Route::resource('venues', VenueController::class);
    });

require __DIR__.'/auth.php';