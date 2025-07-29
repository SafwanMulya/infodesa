<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agama extends Model
{
    /** @use HasFactory<\Database\Factories\AgamaFactory> */
    use HasFactory;
    protected $fillable = [
        'islam',
        'kristen',
        'katolik',
        'hindu',
        'budha',
        'konghucu',
    ];
}
