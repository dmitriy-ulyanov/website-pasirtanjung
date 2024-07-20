<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarouselWisata;
use App\Http\Controllers\Controller;
use Database\Seeders\CarouselWisataSeeder;
use Illuminate\Support\Facades\Session;

Session::start();

class CarouselWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carouselwisata = CarouselWisata::orderBy('id')->get();
        return view('carousel.wisata.home', compact(['carouselwisata']));
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
        //
    }

    public function save(Request $request)
    {
        $validation = $request->validate([
            'judul' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,webp|max:2048', // Menghapus 'required' dari sini
        ]);

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('public');
            $validation['gambar'] = $gambarPath;
        } else {
            unset($validation['gambar']); // Menghapus 'gambar' dari validasi jika tidak ada file yang diunggah
        }

        $data = CarouselWisata::create($validation);

        if ($data) {
            session()->flash('success', 'Karousel berhasil disimpan');
            return redirect()->route('carousel.wisata.home');
        } else {
            session()->flash('error', 'Karousel gagal disimpan');
            return redirect()->route('carousel.wisata.create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CarouselWisata $carouselWisata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CarouselWisata $carouselWisata, $id)
    {
        $carouselwisata = CarouselWisata::findOrFail($id);
        return view('carousel.wisata.update', compact('carouselwisata'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CarouselWisata $carouselWisata, $id)
    {
        $carouselwisata = CarouselWisata::findOrFail($id);
        $judul = $request->judul;
        $gambar = $request->gambar;

        $carouselwisata->judul = $judul;
        $carouselwisata->gambar = $gambar;
        $data = $carouselwisata->save();
        if ($data) {
            session()->flash('success', 'Slide berhasil diupdate');
            return redirect(route('carousel/wisata/home'));
        } else {
            session()->flash('error', 'Terdapat masalah ketika mengupdate slide');
            return redirect(route('carousel.wisata/update'));
        }
    }

    public function delete($id)
    {
        $carouselwisata = CarouselWisata::findOrFail($id)->delete();
        if ($carouselwisata) {
            session()->flash('success', 'Karousel berhasil dihapus');
            return redirect(route('carousel/wisata/home'));
        } else {
            session()->flash('error', 'Karousel gagal dihapus');
            return redirect(route('carousel.wisata/home'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarouselWisata $carouselWisata)
    {
        //
    }
}
