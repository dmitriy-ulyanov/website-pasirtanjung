<?php

use App\Http\Controllers\CarouselWisataController;
use App\Http\Controllers\CarouselKegiatanController;
use Illuminate\Support\Facades\Route;

Route::middleware('carouselkegiatan')->group(function () {
    Route::get('carousel/kegiatan/home', [CarouselKegiatanController::class, 'index'])->name('carousel/kegiatan');
    Route::get('/carousel/kegiatan/create', [CarouselKegiatanController::class, 'create'])->name('carousel/kegiatan/create');
    Route::post('/carousel/kegiatan/save', [CarouselKegiatanController::class, 'save'])->name('carousel/kegiatan/save');
    Route::get('/carousel/kegiatan/edit/{id}', [CarouselKegiatanController::class, 'edit'])->name('carousel/kegiatan/edit');
    Route::put('/carousel/kegiatan/edit/{id}', [CarouselKegiatanController::class, 'update'])->name('carousel/kegiatan/update');
    Route::get('/carousel/kegiatan/delete/{id}', [CarouselKegiatanController::class, 'delete'])->name('carousel/kegiatan/delete');
});
