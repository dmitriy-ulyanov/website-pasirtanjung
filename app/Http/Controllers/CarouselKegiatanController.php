<?php

namespace App\Http\Controllers;

use App\Models\CarouselKegiatan;
use App\Http\Controllers\Controller;
use Database\Seeders\CarouselKegiatanSeeder;
use Illuminate\Http\Request;
class CarouselKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carouselkegiatan = CarouselKegiatan::orderBy('id')->get();
        return view('carousel.kegiatan.home', compact(['carouselkegiatan']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('carousel.kegiatan.create');
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
            'gambar' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('public');
            $validation['gambar'] = $gambarPath;
        }

        $data = CarouselKegiatan::create($validation);

        if ($data) {
            session()->flash('success', 'Karousel berhasil disimpan');
            return redirect()->route('carousel.kegiatan.home');
        } else {
            session()->flash('error', 'Karousel gagal disimpan');
            return redirect()->route('carousel.kegiatan.create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CarouselKegiatan $carouselKegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CarouselKegiatan $carouselKegiatan)
    {
        $carouselkegiatan = CarouselKegiatan::findOrFail($id);
        return view('carousel.kegiatan.update', compact('carouselkegiatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CarouselKegiatan $carouselKegiatan)
    {
        $carouselkegiatan = CarouselKegiatan::findOrFail($id);
        $judul = $request->judul;
        $gambar = $request->gambar;

        $carouselkegiatan->judul = $judul;
        $carouselkegiatan->artikel = $artikel;
        $carouselkegiatan->gambar = $gambar;
        $data = $carouselkegiatan->save();
        if ($data) {
            session()->flash('success', 'Slide berhasil diupdate');
            return redirect(route('carousel/kegiatan/home'));
        } else {
            session()->flash('error', 'Terdapat masalah ketika mengupdate slide');
            return redirect(route('carousel.kegiatan/update'));
        }
    }

    public function delete($id)
    {
        $carouselkegiatan = CarouselKegiatan::findOrFail($id)->delete();
        if ($carouselkegiatan) {
            session()->flash('success', 'Karousel berhasil dihapus');
            return redirect(route('carousel/kegiatan/home'));
        } else {
            session()->flash('error', 'Karousel gagal dihapus');
            return redirect(route('carousel.kegiatan/home'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarouselKegiatan $carouselKegiatan)
    {
        //
    }
}
