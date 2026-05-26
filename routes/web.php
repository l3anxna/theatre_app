<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ShowController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');});
    Route::resource('shows', ShowController::class);
});

require __DIR__.'/auth.php';
