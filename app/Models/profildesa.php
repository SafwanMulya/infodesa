<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profildesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_desa',
        'alamat_desa',
        'kode_pos',
        'telepon',
        'email',
        'luas_wilayah',
        'kecamatan',
        'kabupaten',
        'provinsi',
    ];
}