<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanUmum extends Model
{
    use HasFactory;
    protected $table = 'pendidikan_umums';
    protected $fillable = [
        'jenjang',
        'jumlah_negeri',
        'jumlah_swasta',
        'jumlah_sekolah',
        'jumlah_murid',
    ];
}
