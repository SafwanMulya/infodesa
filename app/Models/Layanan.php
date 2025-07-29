<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;
    protected $fillable = ['nama','keterangan','kode_layanan','template_surat'];

    public function permohonan()
    {
        return $this->hasMany(Permohonan::class);
    }
}
