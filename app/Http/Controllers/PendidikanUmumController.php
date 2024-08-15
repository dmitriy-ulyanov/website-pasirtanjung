<?php

namespace App\Http\Controllers;

use App\Models\PendidikanUmum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PendidikanUmumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function homindex()
    {
        // Mengambil kolom id, judul, dan gambar dari tabel pendidikan_umums
        $sekolah = PendidikanUmum::select('id', 'jenjang', 'jumlah_negeri', 'jumlah_swasta', 'jumlah_sekolah', 'jumlah_murid')->get();

        // Mengembalikan view dengan data yang diambil dari database
        return view('pendidikan.umum.homindex', [
            'pendidikan_umums' => $sekolah
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pendidikan.umum.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenjang' => 'required|string',
            'jumlah_negeri' => 'required|integer',
            'jumlah_swasta' => 'required|integer',
            'jumlah_sekolah' => 'required|integer',
            'jumlah_murid' => 'required|integer',
        ]);

        PendidikanUmum::create([
            'jenjang' => $request->jenjang,
            'jumlah_negeri' => $request->jumlah_negeri,
            'jumlah_swasta' => $request->jumlah_swasta,
            'jumlah_sekolah' => $request->jumlah_sekolah,
            'jumlah_murid' => $request->jumlah_murid,
        ]);

        return redirect('pendidikan.umum.homindex')->with('status',"Daftar Fasilitas Pendidikan berhasil dibuat");
    }

    /**
     * Display the specified resource.
     */
    public function show(PendidikanUmum $pendidikanumum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PendidikanUmum $pendidikanumum)
    {
        return view('pendidikan.umum.edit', compact('pendidikanumum'));
    }

    public function update(Request $request, PendidikanUmum $pendidikanumum)
    {
        $request->validate([
            'jenjang' => 'required|string',
            'jumlah_negeri' => 'required|integer',
            'jumlah_swasta' => 'required|integer',
            'jumlah_sekolah' => 'required|integer',
            'jumlah_murid' => 'required|integer',
        ]);

        $pendidikanumum->update([
            'jenjang' => $request->jenjang,
            'jumlah_negeri' => $request->jumlah_negeri,
            'jumlah_swasta' => $request->jumlah_swasta,
            'jumlah_sekolah' => $request->jumlah_sekolah,
            'jumlah_murid' => $request->jumlah_murid,
        ]);

        return redirect()->route('pendidikan.umum.homindex')->with('status', "Daftar Fasilitas Pendidikan berhasil diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PendidikanUmum $pendidikanumum)
    {
        $pendidikanumum->delete();
        return redirect()->route('pendidikan.umum.homindex')->with('status', "Daftar Fasilitas Pendidikan berhasil dihapus");
    }
}
