<?php

namespace App\Http\Controllers;

use App\Models\Ketertiban;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KetertibanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function homindex()
    {
        // Mengambil kolom id, judul, dan gambar dari tabel peribadatans
        $keamanan = Ketertiban::select('id', 'keamanan', 'jumlah', 'jumlah_hansip')->get();

        // Mengembalikan view dengan data yang diambil dari database
        return view('ketertiban.homindex', [
            'ketertibans' => $keamanan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ketertiban.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'keamanan' => 'required|string',
            'jumlah' => 'required|integer',
            'jumlah_hansip' => 'required|integer',
        ]);

        Ketertiban::create([
            'keamanan' => $request->keamanan,
            'jumlah' => $request->jumlah,
            'jumlah_hansip' => $request->jumlah_hansip,
        ]);

        return redirect('/ketertiban/homindex')->with('status',"Daftar Fasilitas Sanitasi berhasil dibuat");
    }

    /**
     * Display the specified resource.
     */
    public function show(Ketertiban $ketertiban)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ketertiban $ketertiban)
    {
        return view('ketertiban.edit', compact('ketertiban'));
    }

    public function update(Request $request, Ketertiban $ketertiban)
    {
        $request->validate([
            'keamanan' => 'required|string',
            'jumlah' => 'required|integer',
            'jumlah_hansip' => 'required|integer',
        ]);

        $ketertiban->update([
            'keamanan' => $request->keamanan,
            'jumlah' => $request->jumlah,
            'jumlah_hansip' => $request->jumlah_hansip,
        ]);

        return redirect()->route('ketertiban.homindex')->with('status', "Daftar Peribadatan berhasil diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ketertiban $ketertiban)
    {
        $ketertiban->delete();
        return redirect()->route('ketertiban.homindex')->with('status', "Daftar Peribadatan berhasil dihapus");
    }
}
