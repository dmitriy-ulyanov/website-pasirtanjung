<?php

namespace App\Http\Controllers;

use App\Models\Kesehatan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KesehatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function faskes()
    {
        // Mengambil kolom id, judul, dan gambar dari tabel kesehatans
        $fasilitaskesehatan = Kesehatan::select('id', 'fasilitas_kesehatan', 'jumlah')->get();

        // Mengembalikan view dengan data yang diambil dari database
        return view('kesehatan.faskes', [
            'kesehatans' => $fasilitaskesehatan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kesehatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fasilitas_kesehatan' => 'required|string',
            'jumlah' => 'required|integer',
        ]);

        Kesehatan::create([
            'fasilitas_kesehatan' => $request->fasilitas_kesehatan,
            'jumlah' => $request->jumlah,
        ]);

        return redirect('kesehatan/faskes')->with('status',"Faskes berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Kesehatan $kesehatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kesehatan $kesehatan)
    {
        return view('kesehatan.edit', compact('kesehatan'));
    }

    public function update(Request $request, Kesehatan $kesehatan)
    {
        $request->validate([
            'fasilitas_kesehatan' => 'required|string',
            'jumlah' => 'required|integer',
        ]);

        $kesehatan->update([
            'fasilitas_kesehatan' => $request->fasilitas_kesehatan,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('kesehatan.faskes')->with('status', "Faskes berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kesehatan $kesehatan)
    {
        $kesehatan->delete();
        return redirect()->route('kesehatan.faskes')->with('status', "Faskes berhasil dihapus");
    }
}
