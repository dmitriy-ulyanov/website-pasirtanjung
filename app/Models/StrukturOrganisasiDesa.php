<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrukturOrganisasiDesa extends Model
{
    use HasFactory;
    protected $table = 'struktur_organisasi_desas';
    protected $fillable = [
        'jabatan',
        'nama_pejabat',
    ];
}
