<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\datadesa;
use App\Models\Penduduk;
use App\Models\Agama;
use App\Models\ProfilDesa;
use App\Models\Hilder;
use App\Models\Informasi;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'penduduk' => Penduduk::all(),
            'agamas' => Agama::all(),
            'profilDesa' => ProfilDesa::latest()->first(),
            'hilder' => Hilder::latest()->first(), //
            'datadesa'=>datadesa::all(),
            'informasi'=>informasi::all(),
        ]);
    }
}
