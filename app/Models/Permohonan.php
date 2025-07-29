<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    /** @use HasFactory<\Database\Factories\PermohonanFactory> */
    use HasFactory;
    protected $fillable = ['nik','nama_pemohon','alamat','nohp','data_permohonan'];
    public $casts = [
        'data_permohonan'=>'array',
    ];
    function layanan(){
        return $this->belongsTo(Layanan::class);
    }
}
