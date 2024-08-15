<?php

namespace App\Http\Controllers;

use App\Models\Misi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function misi()
    {
        // Mengambil kolom id, judul, dan gambar dari tabel olahragas
        $misi = Misi::select('id', 'no', 'misi')->get();

        // Mengembalikan view dengan data yang diambil dari database
        return view('visimisi.misi', [
            'misis' => $misi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('visimisi.createmisi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no' => 'required|integer',
            'misi' => 'required|string',
        ]);

        Misi::create([
            'no' => $request->no,
            'misi' => $request->misi,
        ]);

        return redirect('misi.misi')->with('status',"Daftar tempat olahraga berhasil dibuat");
    }

    /**
     * Display the specified resource.
     */
    public function show(Misi $misi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Misi $misi)
    {
        return view('visimisi.editmisi', compact('misi'));
    }

    public function update(Request $request, Misi $misi)
    {
        $request->validate([
            'no' => 'required|integer',
            'misi' => 'required|string',
        ]);

        $misi->update([
            'no' => $request->no,
            'misi' => $request->misi,
        ]);

        return redirect()->route('misi.misi')->with('status', "Misi Desa berhasil diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Misi $misi)
    {
        $misi->delete();
        return redirect()->route('misi.misi')->with('status', "Misi Desa berhasil dihapus");
    }
}
