<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datadesa extends Model
{
    /** @use HasFactory<\Database\Factories\DatadesaFactory> */
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'penduduk_laki_laki',
        'penduduk_perempuan',
        'penduduk_jumlah',
    ];
}
