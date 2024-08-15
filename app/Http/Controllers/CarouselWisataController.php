<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\CarouselWisata;
use App\Http\Controllers\Controller;
use Database\Seeders\CarouselWisataSeeder;

class CarouselWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function promosi()
    {
        $bannerpromosi = CarouselWisata::select('id', 'judul', 'gambar')->get();

        // Menambahkan URL gambar ke setiap item
        $bannerpromosi->each(function ($item) {
            $item->gambar_url = Storage::url($item->gambar);
        });

        return view('carousel.wisata.promosi', [
            'carousel_wisatas' => $bannerpromosi
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
            'gambar' => 'required|image|mimes:jpeg,png,jpg,svg,webp|max:15360',
        ]);

        CarouselWisata::create([
            'judul' => $request->judul,
            'gambar' => $request->file('gambar')->store('public'),
        ]);

        return redirect('/carousel/wisata/promosi')->with('status',"Banner berhasil dibuat");
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
    public function edit(CarouselWisata $carouselwisatum)
    {
        return view('carousel.wisata.edit', compact('carouselwisatum'));
    }

    public function update(Request $request, CarouselWisata $carouselwisatum)
    {
        $request->validate([
            'judul' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:15360',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($carouselwisatum->gambar) {
                Storage::delete($carouselwisatum->gambar);
            }
            $path = $request->file('gambar')->store('public');
        } else {
            $path = $carouselwisatum->gambar;
        }

        $carouselwisatum->update([
            'judul' => $request->judul,
            'gambar' => $path,
        ]);

        return redirect()->route('carouselwisata.promosi')->with('status', "Banner berhasil diperbarui");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarouselWisata $carouselwisatum)
    {
        if ($carouselwisatum->gambar) {
            Storage::delete($carouselwisatum->gambar);
        }
        $carouselwisatum->delete();
        return redirect()->route('carouselwisata.promosi')->with('status', "Banner berhasil dihapus");
    }
}
