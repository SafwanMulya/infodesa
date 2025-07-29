<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suratsktm extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap', 'nik', 'tempat_tanggal_lahir', 'kewarganegaraan', 'agama', 'pekerjaan', 'alamat', 'no_hp',
        'nama_ayah', 'nik_ayah', 'ttl_ayah', 'kewarganegaraan_ayah', 'agama_ayah', 'pekerjaan_ayah', 'alamat_ayah',
        'nama_ibu', 'nik_ibu', 'ttl_ibu', 'kewarganegaraan_ibu', 'agama_ibu', 'pekerjaan_ibu', 'alamat_ibu',
        'foto_ktp', 'foto_kk'
    ];
}
