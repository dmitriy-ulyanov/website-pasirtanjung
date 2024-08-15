<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peribadatan extends Model
{
    use HasFactory;
    protected $table = 'peribadatans';
    protected $fillable = [
        'tempat_ibadah',
        'jumlah',
    ];
}
