<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentar;
use App\Models\Informasi;

class KomentarController extends Controller
{
    public function store(Request $request, $informasi_id)
    {
        //dd($request->all());
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:100',
            'isi' => 'required|string',
        ]);

        // Pastikan informasi ada
        $informasi = Informasi::findOrFail($informasi_id);

        // Simpan komentar
        Komentar::create([
            'informasi_id' => $informasi->id,
            'nama' => $request->nama,
            'isi' => $request->isi,
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan!');
    }
}
