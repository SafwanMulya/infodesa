<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hilder extends Model
{
    /** @use HasFactory<\Database\Factories\HilderFactory> */
    use HasFactory;
    protected $fillable = [
        'judul',
        'isi',
        'alamat',
        'gambar',
    ];
}
