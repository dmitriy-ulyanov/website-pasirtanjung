<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanitasi extends Model
{
    use HasFactory;
    protected $table = 'sanitasis';
    protected $fillable = [
        'nama_sanitasi',
        'jumlah',
        'satuan',
    ];
}
