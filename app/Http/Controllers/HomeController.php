<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarouselWisata;
use App\Models\CarouselKegiatan;
use App\Models\Kesehatan;
use App\Models\Peribadatan;
use App\Models\Olahraga;
use App\Models\Ekonomi;
use App\Models\Sanitasi;
use App\Models\Potensi;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil data dari CarouselWisata
        $bannerpromosi = CarouselWisata::select('id', 'judul', 'gambar')->get();
        $bannerpromosi->each(function ($item) {
            $item->gambar_url = Storage::url($item->gambar);
        });

        // Ambil data dari CarouselKegiatan
        $slideberita = CarouselKegiatan::select('id', 'judul', 'artikel', 'gambar', 'tanggal')->get();
        $slideberita->each(function ($item) {
            $item->gambar_url = Storage::url($item->gambar);
        });

        // Mengambil data dari tabel kesehatans
        $fasilitaskesehatan = Kesehatan::select('id', 'fasilitas_kesehatan', 'jumlah')->get();

        // Mengambil data dari tabel peribadatans
        $ibadah = Peribadatan::select('id', 'tempat_ibadah', 'jumlah')->get();

        // Mengambil data dari tabel olahragas
        $olahraga = Olahraga::select('id', 'fasilitas_olahraga', 'jumlah')->get();

        $bisnis = Ekonomi::select('id', 'nama_bisnis', 'jumlah', 'satuan')->get();

        $potensi = Potensi::select('id', 'jumlah_penduduk', 'pria', 'wanita', 'luas', 'rw', 'rt')->get();

        // Kirim data ke view
        return view('home', [
            'carousel_wisatas' => $bannerpromosi,
            'carousel_kegiatans' => $slideberita,
            'kesehatans' => $fasilitaskesehatan,
            'peribadatans' => $ibadah,
            'olahragas' => $olahraga,
            'ekonomis' => $bisnis,
            'potensis' => $potensi
        ]);
    }
}
