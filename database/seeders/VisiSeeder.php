<?php

namespace Database\Seeders;

use App\Models\Visi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Visi::create([
            'visi' => 'Menjadi desa yang mandiri, sejahtera, dan berbudaya dengan mengedepankan partisipasi aktif seluruh warga dalam pembangunan desa.',
        ]);
    }
}
