<?php

namespace App\Http\Controllers;

use App\Models\Sanitasi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SanitasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function homindex()
    {
        // Mengambil kolom id, judul, dan gambar dari tabel peribadatans
        $sanitasi = Sanitasi::select('id', 'nama_sanitasi', 'jumlah', 'satuan')->get();

        // Mengembalikan view dengan data yang diambil dari database
        return view('sanitasi.homindex', [
            'sanitasis' => $sanitasi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sanitasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_sanitasi' => 'required|string',
            'jumlah' => 'required|integer',
            'satuan' => 'required|string',
        ]);

        Sanitasi::create([
            'nama_sanitasi' => $request->nama_sanitasi,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
        ]);

        return redirect('/sanitasi/homindex')->with('status',"Daftar Fasilitas Sanitasi berhasil dibuat");
    }

    /**
     * Display the specified resource.
     */
    public function show(Sanitasi $sanitasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sanitasi $sanitasi)
    {
        return view('sanitasi.edit', compact('sanitasi'));
    }

    public function update(Request $request, Sanitasi $sanitasi)
    {
        $request->validate([
            'nama_sanitasi' => 'nullable|string',
            'jumlah' => 'nullable|integer',
            'satuan' => 'nullable|string',
        ]);

        $sanitasi->update([
            'nama_sanitasi' => $request->nama_sanitasi,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
        ]);

        return redirect()->route('sanitasi.homindex')->with('status', "Daftar Fasilitas Sanitasi berhasil diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sanitasi $sanitasi)
    {
        $sanitasi->delete();
        return redirect()->route('sanitasi.homindex')->with('status', "Daftar Fasilitas Sanitasi berhasil dihapus");
    }
}
