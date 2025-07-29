<?php

namespace App\Http\Controllers;

use App\Models\adminsktm;
use Illuminate\Http\Request;
use App\Models\Suratsktm;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminsktmController extends Controller
{
   public function index()
{
    $data = Suratsktm::latest()->get();
    return view('admin.adminsktm.index', compact('data'));
}


    public function create()
    {
        return view('admin.adminsktm.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:20',
            'alamat' => 'required|string',
            'gambar_ktp' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gambar_kk' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar_ktp')) {
            $data['gambar_ktp'] = $request->file('gambar_ktp')->store('ktp');
        }

        if ($request->hasFile('gambar_kk')) {
            $data['gambar_kk'] = $request->file('gambar_kk')->store('kk');
        }

        adminsktm::create($data);

        return redirect()->route('admin.adminsktm.index')->with('success', 'Data SKTM berhasil ditambahkan');
    }

    public function show(adminsktm $adminsktm)
    {
        return view('admin.adminsktm.show', compact('adminsktm'));
    }

    public function edit(adminsktm $adminsktm)
    {
        return view('admin.adminsktm.edit', compact('adminsktm'));
    }

    public function update(Request $request, adminsktm $adminsktm)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:20',
            'alamat' => 'required|string',
            'gambar_ktp' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gambar_kk' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar_ktp')) {
            $data['gambar_ktp'] = $request->file('gambar_ktp')->store('ktp');
        }

        if ($request->hasFile('gambar_kk')) {
            $data['gambar_kk'] = $request->file('gambar_kk')->store('kk');
        }

        $adminsktm->update($data);

        return redirect()->route('admin.adminsktm.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(adminsktm $adminsktm)
    {
        $adminsktm->delete();
        return redirect()->route('admin.adminsktm.index')->with('success', 'Data berhasil dihapus');
    }
    public function cetak($id)
{
    $data = Suratsktm::findOrFail($id);
    $pdf = Pdf::loadView('admin.adminsktm.pdf', compact('data'));
    return $pdf->stream('sktm_'.$data->nama_lengkap.'.pdf');
}
}
