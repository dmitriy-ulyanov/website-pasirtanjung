<?php

namespace App\Http\Controllers;

use App\Models\PendidikanKeagamaan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PendidikanKeagamaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function homindex()
    {
        // Mengambil kolom id, judul, dan gambar dari tabel pendidikan_keagamaans
        $sekolahagama = PendidikanKeagamaan::select('id', 'satuan_pendidikan', 'jumlah', 'jumlah_murid')->get();

        // Mengembalikan view dengan data yang diambil dari database
        return view('pendidikan.keagamaan.homindex', [
            'pendidikan_keagamaans' => $sekolahagama
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pendidikan.keagamaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'satuan_pendidikan' => 'required|string',
            'jumlah' => 'required|integer',
            'jumlah_murid' => 'required|integer',
        ]);

        PendidikanKeagamaan::create([
            'satuan_pendidikan' => $request->satuan_pendidikan,
            'jumlah' => $request->jumlah,
            'jumlah_murid' => $request->jumlah_murid,
        ]);

        return redirect('pendidikan.keagamaan.homindex')->with('status',"Daftar Fasilitas Pendidikan Keagamaan berhasil dibuat");
    }

    /**
     * Display the specified resource.
     */
    public function show(PendidikanKeagamaan $pendidikankeagamaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PendidikanKeagamaan $pendidikankeagamaan)
    {
        return view('pendidikan.keagamaan.edit', compact('pendidikankeagamaan'));
    }

    public function update(Request $request, PendidikanKeagamaan $pendidikankeagamaan)
    {
        $request->validate([
            'satuan_pendidikan' => 'required|string',
            'jumlah' => 'required|integer',
            'jumlah_murid' => 'required|integer',
        ]);

        $pendidikankeagamaan->update([
            'satuan_pendidikan' => $request->satuan_pendidikan,
            'jumlah' => $request->jumlah,
            'jumlah_murid' => $request->jumlah_murid,
        ]);

        return redirect()->route('pendidikan.keagamaan.homindex')->with('status', "Daftar Fasilitas Pendidikan Keagamaan berhasil diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PendidikanKeagamaan $pendidikankeagamaan)
    {
        $pendidikankeagamaan->delete();
        return redirect()->route('pendidikan.keagamaan.homindex')->with('status', "Daftar Fasilitas Pendidikan Keagamaan berhasil dihapus");
    }
}
