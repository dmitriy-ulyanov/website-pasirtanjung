<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekonomi extends Model
{
    use HasFactory;
    protected $table = 'ekonomis';
    protected $fillable = [
        'nama_bisnis',
        'jumlah',
        'satuan',
    ];
}
