<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Produk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function homindex()
    {
        // Mengambil kolom id, judul, dan gambar dari tabel carousel_wisatas
        $usaha = Produk::select('id', 'nama_produk', 'sapaan', 'nama_penjual', 'deskripsi', 'foto_produk', 'tokopedia', 'shopee', 'whatsapp', 'alamat', 'maps', 'foto_lokasi')->get();

        // Mengembalikan view dengan data yang diambil dari database
        return view('produk.homindex', [
            'produks' => $usaha
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string',
            'sapaan' => 'required|string',
            'nama_penjual' => 'required|string',
            'deskripsi' => 'required|string',
            'foto_produk' => 'required|image|mimes:jpeg,png,jpg,svg,webp|max:15360',
            'tokopedia' => 'required|string',
            'shopee' => 'required|string',
            'whatsapp' => 'required|string',
            'alamat' => 'required|string',
            'maps' => 'required|string',
            'foto_lokasi' => 'required|image|mimes:jpeg,png,jpg,svg,webp|max:15360',
        ]);

        Produk::create([
            'nama_produk' => $request->nama_produk,
            'sapaan' => $request->sapaan,
            'nama_penjual' => $request->nama_penjual,
            'deskripsi' => $request->deskripsi,
            'foto_produk' => $request->file('foto_produk')->store('storage/public'),
            'tokopedia' => $request->tokopedia,
            'shopee' => $request->shopee,
            'whatsapp' => $request->whatsapp,
            'alamat' => $request->alamat,
            'maps' => $request->maps,
            'foto_lokasi' => $request->file('foto_lokasi')->store('storage/public'),
        ]);

        return redirect('produk.homindex')->with('status',"Daftar produk berhasil dibuat");
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'nama_produk' => 'nullable|string',
            'sapaan' => 'nullable|string',
            'nama_penjual' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'foto_produk' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:15360',
            'tokopedia' => 'nullable|string',
            'shopee' => 'nullable|string',
            'whatsapp' => 'nullable|string',
            'alamat' => 'nullable|string',
            'maps' => 'nullable|string',
            'foto_lokasi' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:15360',
        ]);

        // Mengelola upload gambar produk baru
        if ($request->hasFile('foto_produk')) {
            // Hapus gambar produk lama jika ada
            if ($produk->foto_produk) {
                Storage::delete($produk->foto_produk);
            }
            $fotoProdukPath = $request->file('foto_produk')->store('public');
        } else {
            $fotoProdukPath = $produk->foto_produk;
        }

        // Mengelola upload gambar lokasi baru
        if ($request->hasFile('foto_lokasi')) {
            // Hapus gambar lokasi lama jika ada
            if ($produk->foto_lokasi) {
                Storage::delete($produk->foto_lokasi);
            }
            $fotoLokasiPath = $request->file('foto_lokasi')->store('public');
        } else {
            $fotoLokasiPath = $produk->foto_lokasi;
        }

        // Update data produk
        $produk->update([
            'nama_produk' => $request->nama_produk,
            'sapaan' => $request->sapaan,
            'nama_penjual' => $request->nama_penjual,
            'deskripsi' => $request->deskripsi,
            'foto_produk' => $fotoProdukPath,
            'tokopedia' => $request->tokopedia,
            'shopee' => $request->shopee,
            'whatsapp' => $request->whatsapp,
            'alamat' => $request->alamat,
            'maps' => $request->maps,
            'foto_lokasi' => $fotoLokasiPath,
        ]);

        return redirect()->route('produk.homindex')->with('status', "Produk berhasil diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        if ($produk->foto_produk) {
            Storage::delete($produk->foto_produk);
        }

        if ($produk->foto_lokasi) {
            Storage::delete($produk->foto_lokasi);
        }

        $produk->delete();
        return redirect()->route('produk.homindex')->with('status', "Produk berhasil dihapus");
    }
}
