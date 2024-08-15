<?php

namespace App\Http\Controllers;

use App\Models\Potensi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PotensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function homindex()
    {
        // Mengambil kolom id, judul, dan gambar dari tabel peribadatans
        $potensi = Potensi::select('id', 'jumlah_penduduk', 'pria', 'wanita', 'luas', 'rw', 'rt')->get();

        // Mengembalikan view dengan data yang diambil dari database
        return view('potensi.homindex', [
            'potensis' => $potensi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Potensi $potensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Potensi $potensi)
    {
        return view('potensi.edit', compact('potensi'));
    }

    public function update(Request $request, Potensi $potensi)
    {
        $request->validate([
            'jumlah_penduduk' => 'nullable|string',
            'pria' => 'nullable|string',
            'wanita' => 'nullable|string',
            'luas' => 'nullable|string',
            'rw' => 'nullable|string',
            'rt' => 'nullable|string',
        ]);

        $potensi->update([
            'jumlah_penduduk' => $request->jumlah_penduduk,
            'pria' => $request->pria,
            'wanita' => $request->wanita,
            'luas' => $request->luas,
            'rw' => $request->rw,
            'rt' => $request->rt,
        ]);

        return redirect()->route('potensi.homindex')->with('status', "Daftar Peribadatan berhasil diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Potensi $potensi)
    {
        //
    }
}
