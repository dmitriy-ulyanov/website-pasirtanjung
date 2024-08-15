<?php

namespace App\Http\Controllers;

use App\Models\Peribadatan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PeribadatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function homindex()
    {
        // Mengambil kolom id, judul, dan gambar dari tabel peribadatans
        $ibadah = Peribadatan::select('id', 'tempat_ibadah', 'jumlah')->get();

        // Mengembalikan view dengan data yang diambil dari database
        return view('peribadatan.homindex', [
            'peribadatans' => $ibadah
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peribadatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tempat_ibadah' => 'required|string',
            'jumlah' => 'required|integer',
        ]);

        Peribadatan::create([
            'tempat_ibadah' => $request->tempat_ibadah,
            'jumlah' => $request->jumlah,
        ]);

        return redirect('/peribadatan/homindex')->with('status',"Daftar Peribadatan berhasil dibuat");
    }

    /**
     * Display the specified resource.
     */
    public function show(Peribadatan $peribadatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peribadatan $peribadatan)
    {
        return view('peribadatan.edit', compact('peribadatan'));
    }

    public function update(Request $request, Peribadatan $peribadatan)
    {
        $request->validate([
            'tempat_ibadah' => 'required|string',
            'jumlah' => 'required|integer',
        ]);

        $peribadatan->update([
            'tempat_ibadah' => $request->tempat_ibadah,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('peribadatan.homindex')->with('status', "Daftar Peribadatan berhasil diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peribadatan $peribadatan)
    {
        $peribadatan->delete();
        return redirect()->route('peribadatan.homindex')->with('status', "Daftar Peribadatan berhasil dihapus");
    }
}
