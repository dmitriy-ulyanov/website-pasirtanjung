<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarouselKegiatan extends Model
{
    use HasFactory;
    protected $table = 'carousel_kegiatans';
    protected $fillable = [
        'judul',
        'artikel',
        'gambar',
        'tanggal',
    ];
}
