<?php

use App\Http\Controllers\Admin\ActorController;
use App\Http\Controllers\Admin\ShowController;
use App\Http\Controllers\Admin\VenueController;

use App\Http\Controllers\ActorPageController;
use App\Http\Controllers\ShowPageController;
use App\Http\Controllers\VenuePageController;
use App\Http\Controllers\BookingPageController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;

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

Route::get('/shows/{show:slug}/book', [BookingPageController::class, 'create'])
    ->name('bookings.create');

Route::post('/shows/{show:slug}/book', [BookingPageController::class, 'store'])
    ->name('bookings.store');

// Actors
Route::get('/actors', [ActorPageController::class, 'index'])
    ->name('actors.index');

Route::get('/actors/{actor:slug}', [ActorPageController::class, 'show'])
    ->name('actors.show');

// Venues
Route::get('/venues', [VenuePageController::class, 'index'])
    ->name('venues.index');

Route::get('/venues/{venue:slug}', [VenuePageController::class, 'show'])
    ->name('venues.show');


Route::get('/bookings', [BookingPageController::class, 'index'])
    ->name('bookings.index');
    
Route::get('/bookings/{booking}', [BookingPageController::class, 'show'])
    ->name('bookings.show');

Route::get('/u/{user}', [ProfileController::class, 'show'])
    ->name('profiles.show');

/*
|--------------------------------------------------------------------------
| Login User
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/shows/{show:slug}/favorite', [FavoriteController::class, 'toggle'])
        ->name('shows.favorite');

    Route::post('/shows/{show:slug}/reviews', [ReviewController::class, 'store'])
        ->name('shows.reviews.store');

    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])
        ->name('reviews.destroy');
});

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
