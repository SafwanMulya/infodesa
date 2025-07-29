<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratDomisili extends Model
{
    use HasFactory;

    protected $table = 'surat_domisilis'; // Nama tabel di database

    protected $fillable = [
        'nama_lengkap',
        'nik',
        'tempat_tanggal_lahir',
        'jenis_kelamin',
        'kewarganegaraan',
        'agama',
        'pekerjaan',
        'alamat_sebelumnya', // Alamat sebelum pindah
        'alamat_sekarang',   // Alamat domisili saat ini
        'no_hp',
        'email',
        'foto_ktp',
        'foto_kk',
        'status', // dalam proses, disetujui, ditolak
    ];
}
