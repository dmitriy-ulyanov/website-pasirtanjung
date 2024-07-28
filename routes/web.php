<?php

namespace Routes;

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CarouselWisata;
use App\Admin\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarouselWisataController;

Route::get('/', function () {
    return view('home');
});

Route::get('/produk', function () {
    return view('produk');
});

Route::get('/wisata', function () {
    return view('wisata');
});

Route::get('/operator', function () {
    return view('welcome');
});

Route::get('/dashboard', [CarouselWisataController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('carouselwisata', CarouselWisataController::class);
});

require __DIR__.'/auth.php';
