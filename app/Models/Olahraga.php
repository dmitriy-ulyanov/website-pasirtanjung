<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Olahraga extends Model
{
    use HasFactory;
    protected $table = 'olahragas';
    protected $fillable = [
        'fasilitas_olahraga',
        'jumlah',
    ];
}
