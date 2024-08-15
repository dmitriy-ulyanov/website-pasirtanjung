<?php

namespace App\Http\Controllers;

use App\Models\Visi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function visi()
    {
        // Mengambil kolom id, judul, dan gambar dari tabel peribadatans
        $visi = Visi::select('id', 'visi')->get();

        // Mengembalikan view dengan data yang diambil dari database
        return view('visimisi.visi', [
            'visis' => $visi
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
    public function show(Visi $visi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visi $visi)
    {
        return view('visi.editvisi', compact('visi'));
    }

    public function update(Request $request, Visi $visi)
    {
        $request->validate([
            'visi' => 'nullable|string',
        ]);

        $visi->update([
            'visi' => $request->visi,
        ]);

        return redirect()->route('visi.visi')->with('status', "Daftar Peribadatan berhasil diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visi $visi)
    {
        //
    }
}
