<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatasWilayah extends Model
{
    use HasFactory;
    protected $table = 'batas_wilayahs';
    protected $fillable = [
        'posisi',
        'nama_desa',
    ];
}
