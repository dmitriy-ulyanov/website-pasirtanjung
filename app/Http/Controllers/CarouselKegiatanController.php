<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\CarouselKegiatan;
use App\Http\Controllers\Controller;
use Database\Seeders\CarouselKegiatanSeeder;

class CarouselKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function berita()
    {
        // Mengambil kolom id, judul, artikel, dan gambar dari tabel carousel_kegiatans
        $slideberita = CarouselKegiatan::select('id', 'judul', 'artikel', 'gambar', 'tanggal')->get();

        // Menambahkan URL gambar ke setiap item
        $slideberita->each(function ($item) {
            $item->gambar_url = Storage::url($item->gambar);
        });

        // Mengembalikan view dengan data yang diambil dari database
        return view('carousel.kegiatan.berita', [
            'carousel_kegiatans' => $slideberita
        ]);
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
        $request->validate([
            'judul' => 'required|string',
            'artikel' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,svg,webp|max:15360',
            'tanggal' => 'required|date',
        ]);

        CarouselKegiatan::create([
            'judul' => $request->judul,
            'artikel' => $request->artikel,
            'gambar' => $request->file('gambar')->store('public'),
            'tanggal' => $request->tanggal ?? now()->toDateString(),
        ]);

        return redirect()->route('carouselkegiatan.berita')->with('status', 'Berita berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(CarouselKegiatan $carouselkegiatan)
    {
        //return view('carousel.kegiatan.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CarouselKegiatan $carouselkegiatan)
    {
        return view('carousel.kegiatan.edit', compact('carouselkegiatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CarouselKegiatan $carouselkegiatan)
    {
        $request->validate([
            'judul' => 'nullable|string',
            'artikel' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:15000',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($carouselkegiatan->gambar) {
                Storage::delete($carouselkegiatan->gambar);
            }
            $path = $request->file('gambar')->store('public');
        } else {
            $path = $carouselkegiatan->gambar;
        }

        $carouselkegiatan->update([
            'judul' => $request->judul,
            'artikel' => $request->artikel,
            'gambar' => $path,
        ]);

        return redirect()->route('carouselkegiatan.berita')->with('status', "Berita berhasil diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarouselKegiatan $carouselkegiatan)
    {
        if ($carouselkegiatan->gambar) {
            Storage::delete($carouselkegiatan->gambar);
        }
        $carouselkegiatan->delete();
        return redirect()->route('carouselkegiatan.berita')->with('status', "Berita berhasil dihapus");
    }
}
