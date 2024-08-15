<?php

namespace App\Http\Controllers;

use App\Models\Olahraga;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OlahragaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function homindex()
    {
        // Mengambil kolom id, judul, dan gambar dari tabel olahragas
        $olahraga = Olahraga::select('id', 'fasilitas_olahraga', 'jumlah')->get();

        // Mengembalikan view dengan data yang diambil dari database
        return view('olahraga.homindex', [
            'olahragas' => $olahraga
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('olahraga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fasilitas_olahraga' => 'required|string',
            'jumlah' => 'required|integer',
        ]);

        Olahraga::create([
            'fasilitas_olahraga' => $request->fasilitas_olahraga,
            'jumlah' => $request->jumlah,
        ]);

        return redirect('/olahraga/homindex')->with('status',"Daftar tempat olahraga berhasil dibuat");
    }

    /**
     * Display the specified resource.
     */
    public function show(Olahraga $olahraga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Olahraga $olahraga)
    {
        return view('olahraga.edit', compact('olahraga'));
    }

    public function update(Request $request, Olahraga $olahraga)
    {
        $request->validate([
            'fasilitas_olahraga' => 'required|string',
            'jumlah' => 'required|integer',
        ]);

        $olahraga->update([
            'fasilitas_olahraga' => $request->fasilitas_olahraga,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('olahraga.homindex')->with('status', "Tempat olahraga berhasil diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Olahraga $olahraga)
    {
        $olahraga->delete();
        return redirect()->route('olahraga.homindex')->with('status', "Tempat olahraga berhasil dihapus");
    }
}
