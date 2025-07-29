<?php

namespace App\Http\Controllers;

use App\Models\Adminsuratusaha;
use App\Models\Suratusaha;
use Illuminate\Http\Request;


class AdminsuratusahaController extends Controller
{
    /**
     * Menampilkan seluruh data surat usaha yang diajukan.
     */


public function index()
{
    $data = SuratUsaha::all();
    return view('adminsuratusaha.index', compact('data'));
}


    /**
     * Menampilkan form untuk edit status.
     */
    public function edit($id)
    {
        $suratusaha = Suratusaha::findOrFail($id);
        return view('admin.adminsuratusaha.edit', compact('suratusaha'));
    }

    /**
     * Memperbarui status surat usaha.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:dalam proses,disetujui,ditolak',
        ]);

        $suratusaha = Suratusaha::findOrFail($id);
        $suratusaha->status = $request->status;
        $suratusaha->save();

        return redirect()->route('admin.adminsuratusaha.index')->with('success', 'Status berhasil diperbarui.');
    }

    /**
     * Menampilkan detail surat usaha.
     */
    public function show($id)
    {
        $suratusaha = Suratusaha::findOrFail($id);
        return view('admin.adminsuratusaha.show', compact('suratusaha'));
    }

    /**
     * Menghapus data surat usaha.
     */
    public function destroy($id)
    {
        $suratusaha = Suratusaha::findOrFail($id);
        $suratusaha->delete();
        return redirect()->route('admin.adminsuratusaha.index')->with('success', 'Data berhasil dihapus.');
    }

    /**
     * Cetak PDF (placeholder).
     */
    public function cetak($id)
    {
        $suratusaha = Suratusaha::findOrFail($id);
        // return PDF::loadView('admin.adminsuratusaha.cetak', compact('suratusaha'))->stream(); // jika pakai dompdf
        return view('admin.adminsuratusaha.cetak', compact('suratusaha'));
    }
}
