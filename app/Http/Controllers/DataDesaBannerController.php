<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\DataDesaBanner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataDesaBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function banner()
    {
        $banner = DataDesaBanner::select('gambar')->get();

        // Mengembalikan view dengan data yang diambil dari database
        return view('datadesa.banner.homindex', [
            'data_desa_banners' => $banner
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
    public function show(DataDesaBanner $dataDesaBanner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataDesaBanner $dataDesaBanner)
    {
        return view('datadesa.banner.edit', compact('dataDesaBanner'));
    }

    public function update(Request $request, DataDesaBanner $dataDesaBanner)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,svg,webp|max:15360',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($dataDesaBanner->gambar) {
                Storage::delete($dataDesaBanner->gambar);
            }
            $path = $request->file('gambar')->store('public');
        } else {
            $path = $dataDesaBanner->gambar;
        }

        $dataDesaBanner->update([
            'gambar' => $path,
        ]);

        return redirect()->route('datadesabanner.banner')->with('status', "Banner berhasil diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataDesaBanner $dataDesaBanner)
    {
        //
    }
}
