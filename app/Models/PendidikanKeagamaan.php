<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanKeagamaan extends Model
{
    use HasFactory;
    protected $table = 'pendidikan_keagamaans';
    protected $fillable = [
        'satuan_pendidikan',
        'jumlah',
        'jumlah_murid',
    ];
}
