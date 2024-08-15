<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Potensi;

class PotensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Potensi::create([
            'id' => 1, // Pastikan id adalah 1
            'jumlah_penduduk' => 5.422, // Asumsikan jumlah penduduk adalah integer
            'pria' => 2.853, // Jumlah laki-laki sebagai integer
            'wanita' => 2.569, // Jumlah perempuan sebagai integer
            'luas' => 1.255, // Asumsikan luas sebagai integer, misalnya dalam meter persegi
            'rw' => 7, // Jumlah RW
            'rt' => 24, // Jumlah RT
        ]);
    }
}
