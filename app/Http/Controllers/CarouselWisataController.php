<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarouselWisata;
use App\Http\Controllers\Controller;
use Database\Seeders\CarouselWisataSeeder;

class CarouselWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil kolom id, judul, dan gambar dari tabel carousel_wisatas
        $datacarouselwisata = CarouselWisata::select('id', 'judul', 'gambar')->get();
        // dd($datacarouselwisata); // Pastikan data ini tidak null atau kosong

        // Mengembalikan view dengan data yang diambil dari database
        return view('dashboard', [
            'carousel_wisatas' => $datacarouselwisata
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('carousel.wisata.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,svg,webp|max:4192',
        ]);

        CarouselWisata::create([
            'judul' => $request->judul,
            'gambar' => $request->file('gambar')->store('storage/public'),
        ]);

        return redirect('/dashboard')->with('status','Slide berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(CarouselWisata $carouselWisata)
    {
        return view('carousel.wisata.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('carousel/wisata/edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CarouselWisata $carouselWisata, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarouselWisata $carouselWisata)
    {
        $carouselWisata->delete();
        return redirect('/dashboard')->with('status','Slide berhasil dihapus');
    }
}
