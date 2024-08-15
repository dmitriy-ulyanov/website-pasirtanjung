<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CarouselWisataController;
use App\Http\Controllers\CarouselKegiatanController;
use App\Http\Controllers\VisiController;
use App\Http\Controllers\MisiController;
use App\Http\Controllers\PotensiController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\PendidikanUmumController;
use App\Http\Controllers\PendidikanKeagamaanController;
use App\Http\Controllers\OlahragaController;
use App\Http\Controllers\PeribadatanController;
use App\Http\Controllers\KesehatanController;
use App\Http\Controllers\EkonomiController;
use App\Http\Controllers\SanitasiController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\WisataController;

Route::get('/', function () {
    return view('home');
});

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/produkunggulan', function () {
    return view('produkunggulan');
});

Route::get('/objekwisata', function () {
    return view('objekwisata');
});

Route::get('/anggarandesa', function () {
    return view('anggarandesa');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/carousel/wisata/promosi', [CarouselWisataController::class, 'promosi'])
    ->middleware(['auth', 'verified'])
    ->name('carouselwisata.promosi');

Route::get('/carousel/kegiatan/berita', [CarouselKegiatanController::class, 'berita'])
    ->middleware(['auth', 'verified'])
    ->name('carouselkegiatan.berita');

Route::get('/visimisi/visi', [VisiController::class, 'visi'])
    ->middleware(['auth', 'verified'])
    ->name('visi.visi');

Route::get('/visimisi/misi', [MisiController::class, 'misi'])
    ->middleware(['auth', 'verified'])
    ->name('misi.misi');

Route::get('/potensi/homindex', [PotensiController::class, 'homindex'])
    ->middleware(['auth', 'verified'])
    ->name('potensi.homindex');

Route::get('/pendidikan/homindex', [PendidikanController::class, 'homindex'])
    ->middleware(['auth', 'verified'])
    ->name('pendidikan.homindex');

Route::get('/pendidikan/umum/homindex', [PendidikanUmumController::class, 'homindex'])
    ->middleware(['auth', 'verified'])
    ->name('pendidikanumum.homindex');

Route::get('/pendidikan/keagamaan/homindex', [PendidikanKeagamaanController::class, 'homindex'])
    ->middleware(['auth', 'verified'])
    ->name('pendidikankeagamaan.homindex');

Route::get('/olahraga/homindex', [OlahragaController::class, 'homindex'])
    ->middleware(['auth', 'verified'])
    ->name('olahraga.homindex');

Route::get('/peribadatan/homindex', [PeribadatanController::class, 'homindex'])
    ->middleware(['auth', 'verified'])
    ->name('peribadatan.homindex');

Route::get('/kesehatan/faskes', [KesehatanController::class, 'faskes'])
    ->middleware(['auth', 'verified'])
    ->name('kesehatan.faskes');

Route::get('/ekonomi/bisnis', [EkonomiController::class, 'bisnis'])
    ->middleware(['auth', 'verified'])
    ->name('ekonomi.bisnis');

Route::get('/sanitasi/homindex', [SanitasiController::class, 'homindex'])
    ->middleware(['auth', 'verified'])
    ->name('sanitasi.homindex');

Route::get('/produk/homindex', [ProdukController::class, 'homindex'])
    ->middleware(['auth', 'verified'])
    ->name('produk.homindex');

Route::get('/wisata/homindex', [WisataController::class, 'homindex'])
    ->middleware(['auth', 'verified'])
    ->name('wisata.homindex');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('carouselwisata', CarouselWisataController::class);
    Route::resource('carouselkegiatan', CarouselKegiatanController::class);
    Route::resource('visi', VisiController::class);
    Route::resource('misi', MisiController::class);
    Route::resource('potensi', PotensiController::class);
    Route::resource('pendidikanumum', PendidikanUmumController::class);
    Route::resource('pendidikankeagamaan', PendidikanKeagamaanController::class);
    Route::resource('olahraga', OlahragaController::class);
    Route::resource('peribadatan', PeribadatanController::class);
    Route::resource('kesehatan', KesehatanController::class);
    Route::resource('ekonomi', EkonomiController::class);
    Route::resource('sanitasi', SanitasiController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('wisata', WisataController::class);
});

require __DIR__.'/auth.php';
