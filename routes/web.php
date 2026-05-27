<?php

use App\Http\Controllers\Admin\ActorController;
use App\Http\Controllers\Admin\ShowController;
use App\Http\Controllers\Admin\VenueController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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