<?php

use App\Http\Controllers\CarouselWisataController;
use App\Http\Controllers\CarouselKegiatanController;
use Illuminate\Support\Facades\Route;

Route::middleware('carouselwisata')->group(function () {
    Route::get('carousel/wisata/home', [CarouselWisataController::class, 'index'])->name('carousel/wisata');
    Route::get('/carousel/wisata/create', [CarouselWisataController::class, 'create'])->name('carousel/wisata/create');
    Route::post('/carousel/wisata/save', [CarouselWisataController::class, 'save'])->name('carousel/wisata/save');
    Route::get('/carousel/wisata/edit/{id}', [CarouselWisataController::class, 'edit'])->name('carousel/wisata/edit');
    Route::put('/carousel/wisata/edit/{id}', [CarouselWisataController::class, 'update'])->name('carousel/wisata/update');
    Route::get('/carousel/wisata/delete/{id}', [CarouselWisataController::class, 'delete'])->name('carousel/wisata/delete');
});
