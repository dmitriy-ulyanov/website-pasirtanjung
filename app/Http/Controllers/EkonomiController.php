<?php

namespace App\Http\Controllers;

use App\Models\Ekonomi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EkonomiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function bisnis()
    {
        $bisnis = Ekonomi::select('id', 'nama_bisnis', 'jumlah', 'satuan')->get();

        // Mengembalikan view dengan data yang diambil dari database
        return view('ekonomi.bisnis', [
            'ekonomis' => $bisnis
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ekonomi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_bisnis' => 'required|string',
            'jumlah' => 'required|integer',
            'satuan' => 'required|string',
        ]);

        Ekonomi::create([
            'nama_bisnis' => $request->nama_bisnis,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
        ]);

        return redirect('ekonomi/bisnis')->with('status',"Bisnis berhasil didaftarkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Ekonomi $ekonomi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ekonomi $ekonomi)
    {
        return view('ekonomi.edit', compact('ekonomi'));
    }

    public function update(Request $request, Ekonomi $ekonomi)
    {
        $request->validate([
            'nama_bisnis' => 'required|text',
            'jumlah' => 'required|integer',
            'satuan' => 'required|string',
        ]);

        $ekonomi->update([
            'nama_bisnis' => $request->nama_bisnis,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
        ]);

        return redirect()->route('ekonomi.bisnis')->with('status', "Bisnis {$ekonomi->id} berhasil diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ekonomi $ekonomi)
    {
        $ekonomi->delete();
        return redirect()->route('/ekonomi/bisnis')->with('status', "Bisnis {$ekonomi->id} berhasil dihapus");
    }
}
