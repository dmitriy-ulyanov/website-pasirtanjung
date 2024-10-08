<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Potensi extends Model
{
    use HasFactory;
    protected $table = 'potensis';
    protected $fillable = [
        'jumlah_penduduk',
        'pria',
        'wanita',
        'luas',
        'rw',
        'rt',
    ];
}
