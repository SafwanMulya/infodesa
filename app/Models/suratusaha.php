<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratUsaha extends Model
{
    use HasFactory;

    protected $table = 'suratusahas';

    protected $fillable = [
        'nama_lengkap',
        'nik',
        'tempat_tanggal_lahir',
        'jenis_kelamin',
        'kewarganegaraan',
        'agama',
        'pekerjaan',
        'no_hp',
        'email',
        'alamat',
        'nama_usaha',
        'jenis_usaha',
        'waktu_usaha',
        'foto_ktp',
        'foto_usaha',
        'status', // ✅ tambahkan ini
    ];
}
