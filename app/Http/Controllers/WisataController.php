<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Wisata;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function homindex()
    {
        // Mengambil kolom id, judul, dan gambar dari tabel carousel_wisatas
        $wahanawisata = Wisata::select('id', 'nama_wisata', 'deskripsi', 'foto')->get();

        // Mengembalikan view dengan data yang diambil dari database
        return view('wisata.homindex', [
            'wisatas' => $wahanawisata
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wisata.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_wisata' => 'required|string',
            'deskripsi' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,svg,webp|max:15360',
        ]);

        Wisata::create([
            'nama_wisata' => $request->nama_wisata,
            'deskripsi' => $request->deskripsi,
            'foto' => $request->file('foto')->store('storage/public'),
        ]);

        return redirect('/wisata/homindex')->with('status',"Wahana / Situs wisata berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Wisata $wisata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wisata $wisata)
    {
        return view('wisata.edit', compact('wisata'));
    }

    public function update(Request $request, Wisata $wisatum)
    {
        $request->validate([
            'nama_wisata' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:15360',
        ]);

        if ($request->hasFile('foto')) {
            // Hapus gambar lama
            if ($wisatum->foto) {
                Storage::delete($wisatum->foto);
            }
            $path = $request->file('foto')->store('public');
        } else {
            $path = $wisatum->foto;
        }

        $wisatum->update([
            'nama_wisata' => $request->nama_wisata,
            'deskripsi' => $request->deskripsi,
            'foto' => $path,
        ]);

        return redirect()->route('wisata.homindex')->with('status', "Wahana / Situs wisata berhasil diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wisata $wisatum)
    {
        if ($wisatum->foto) {
            Storage::delete($wisatum->foto);
        }
        $wisatum->delete();
        return redirect()->route('wisata.homindex')->with('status', "Wahana / Situs wisata berhasil dihapus");
    }
}
