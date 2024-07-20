<?php

namespace Routes;

use App\Admin\Controllers\HomeController;
use App\Http\Controllers\CarouselWisataController;
use App\Http\Controllers\CarouselKegiatanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'carouselwisata'])->group(function () {
    Route::get('carousel/wisata/home', [CarouselWisataController::class, 'index'])->name('carousel/wisata');
    Route::get('/carousel/wisata/create', [CarouselWisataController::class, 'create'])->name('carousel/wisata/create');
    Route::post('/carousel/wisata/save', [CarouselWisataController::class, 'save'])->name('carousel/wisata/save');
    Route::get('/carousel/wisata/edit/{id}', [CarouselWisataController::class, 'edit'])->name('carousel/wisata/edit');
    Route::put('/carousel/wisata/edit/{id}', [CarouselWisataController::class, 'update'])->name('carousel/wisata/update');
    Route::get('/carousel/wisata/delete/{id}', [CarouselWisataController::class, 'delete'])->name('carousel/wisata/delete');
});

Route::middleware(['auth', 'carouselkegiatan'])->group(function () {
    Route::get('carousel/kegiatan/home', [CarouselKegiatanController::class, 'index'])->name('carousel/kegiatan');
    Route::get('/carousel/kegiatan/create', [CarouselKegiatanController::class, 'create'])->name('carousel/kegiatan/create');
    Route::post('/carousel/kegiatan/save', [CarouselKegiatanController::class, 'save'])->name('carousel/kegiatan/save');
    Route::get('/carousel/kegiatan/edit/{id}', [CarouselKegiatanController::class, 'edit'])->name('carousel/kegiatan/edit');
    Route::put('/carousel/kegiatan/edit/{id}', [CarouselKegiatanController::class, 'update'])->name('carousel/kegiatan/update');
    Route::get('/carousel/kegiatan/delete/{id}', [CarouselKegiatanController::class, 'delete'])->name('carousel/kegiatan/delete');
});

require __DIR__.'/auth.php';
