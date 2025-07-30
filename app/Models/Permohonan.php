<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    /** @use HasFactory<\Database\Factories\PermohonanFactory> */
    use HasFactory;
    protected $fillable = ['nik_pemohon','nama_pemohon','alamat_pemohon','nohp','data_permohonan','status','kode_tiket','surat_docx','surat_pdf','tte_pada','tanggal_cetak','layanan_id','nama_pejabat','nomor_surat','surat_tte'];
    public $casts = [
        'data_permohonan'=>'array',
    ];
    function layanan(){
        return $this->belongsTo(Layanan::class);
    }
}
