<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Tambahkan ini
class Admin extends Authenticatable
{
    use HasFactory; // Tambahkan ini
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token', // Tambahkan ini jika ada di tabel
    ];
    // Jika Anda ingin menggunakan guard 'admin' secara default untuk model ini
    // protected $guard = 'admin';
}
