<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Informasi;
use App\Models\Permohonan;
use Illuminate\Http\Request;

class DashboardAdmin extends Controller
{
      public function index()
    {
        $data = [
            'jumlahLayanan' => Layanan::count(),
            'jumlahPermohonan' => Permohonan::count(),
            'jumlahInformasi' => Informasi::count(),
        ];
        return view('admin.index',$data); // Halaman dashboard admin
    }
}
