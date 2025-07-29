<?php

namespace App\Http\Controllers;

use App\Models\datadesa;
use App\Models\Agama;
use Illuminate\Http\Request;

class DatadesaController extends Controller
{
    /**
     * Tampilkan halaman utama data desa.
     */
    public function index()
    {
        $singleDatadesa = datadesa::first();
        $isNew = is_null($singleDatadesa);
        $datadesa = datadesa::all();
        $agamas = Agama::all(); // Ambil data agama jika diperlukan

        return view('admin.datadesa.index', compact('singleDatadesa', 'isNew', 'datadesa', 'agamas'));
    }

    /**
     * Tampilkan form buat data baru (jika diperlukan).
     */
    public function create()
    {
        return view('admin.datadesa.create');
    }

    /**
     * Simpan data desa baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'penduduk_laki_laki' => 'required|integer',
            'penduduk_perempuan' => 'required|integer',
        ]);

        // Hitung jumlah penduduk
        $data = $request->only(['penduduk_laki_laki', 'penduduk_perempuan']);
        $data['penduduk_jumlah'] = $data['penduduk_laki_laki'] + $data['penduduk_perempuan'];

        // Simpan ke database
        datadesa::create($data);

        return redirect()->route('admin.datadesa.index')->with('success', 'Data Desa berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail data desa (opsional).
     */
    public function show(datadesa $datadesa)
    {
        return view('admin.datadesa.show', compact('datadesa'));
    }

    /**
     * Tampilkan form edit.
     */
    public function edit(datadesa $datadesa)
    {
        $singleDatadesa = $datadesa;
        $isNew = false;
        $datadesa = datadesa::all();

        return view('admin.datadesa.index', compact('singleDatadesa', 'isNew', 'datadesa'));
    }

    /**
     * Update data desa.
     */
    public function update(Request $request, datadesa $datadesa)
    {
        // Validasi input
        $request->validate([
            'penduduk_laki_laki' => 'required|integer',
            'penduduk_perempuan' => 'required|integer',
        ]);

        // Hitung jumlah penduduk
        $data = $request->only(['penduduk_laki_laki', 'penduduk_perempuan']);
        $data['penduduk_jumlah'] = $data['penduduk_laki_laki'] + $data['penduduk_perempuan'];

        // Update data
        $datadesa->update($data);

        return redirect()->route('admin.datadesa.index')->with('success', 'Data Desa berhasil diperbarui.');
    }

    /**
     * Hapus data desa.
     */
    public function destroy(datadesa $datadesa)
    {
        $datadesa->delete();

        return redirect()->route('admin.datadesa.index')->with('success', 'Data Desa berhasil dihapus.');
    }
}
