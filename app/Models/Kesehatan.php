<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kesehatan extends Model
{
    use HasFactory;
    protected $table = 'kesehatans';
    protected $fillable = [
        'fasilitas_kesehatan',
        'jumlah',
    ];
}
