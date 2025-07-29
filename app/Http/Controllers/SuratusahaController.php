<?php

namespace App\Http\Controllers;

use App\Models\Suratusaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratusahaController extends Controller
{
    public function index()
    {
        $data = Suratusaha::latest()->get();
        return view('suratusaha.index', compact('data'));
    }

    public function create()
    {
        return view('suratusaha.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|max:20',
            'tempat_tanggal_lahir' => 'required|string',
            'jenis_kelamin' => 'required|string|max:15',
            'kewarganegaraan' => 'required|string',
            'agama' => 'required|string',
            'pekerjaan' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'nama_usaha' => 'required|string|max:255',
            'jenis_usaha' => 'required|string|max:255',
            'waktu_usaha' => 'required|string|max:255',
            'foto_ktp' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'foto_usaha' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload files jika ada
        if ($request->hasFile('foto_ktp')) {
            $validated['foto_ktp'] = $request->file('foto_ktp')->store('uploads/foto_ktp', 'public');
        }

        if ($request->hasFile('foto_usaha')) {
            $validated['foto_usaha'] = $request->file('foto_usaha')->store('uploads/foto_usaha', 'public');
        }
        $validated['status'] = 'dalam proses';

        Suratusaha::create($validated);
        return redirect()->route('suratusaha.index')->with('success', 'Data berhasil disimpan.');
    }

    public function show(Suratusaha $suratusaha)
    {
        return view('suratusaha.show', compact('suratusaha'));
    }

    public function edit(Suratusaha $suratusaha)
    {
        return view('suratusaha.edit', compact('suratusaha'));
    }

    public function update(Request $request, Suratusaha $suratusaha)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|max:20',
            'tempat_tanggal_lahir' => 'required|string',
            'jenis_kelamin' => 'required|string|max:15',
            'kewarganegaraan' => 'required|string',
            'agama' => 'required|string',
            'pekerjaan' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'nama_usaha' => 'required|string|max:255',
            'jenis_usaha' => 'required|string|max:255',
            'waktu_usaha' => 'required|string|max:255',
            'foto_ktp' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'foto_usaha' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Ganti file lama jika ada file baru
        if ($request->hasFile('foto_ktp')) {
            if ($suratusaha->foto_ktp) {
                Storage::disk('public')->delete($suratusaha->foto_ktp);
            }
            $validated['foto_ktp'] = $request->file('foto_ktp')->store('uploads/foto_ktp', 'public');
        }

        if ($request->hasFile('foto_usaha')) {
            if ($suratusaha->foto_usaha) {
                Storage::disk('public')->delete($suratusaha->foto_usaha);
            }
            $validated['foto_usaha'] = $request->file('foto_usaha')->store('uploads/foto_usaha', 'public');
        }

        $suratusaha->update($validated);
        return redirect()->route('suratusaha.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Suratusaha $suratusaha)
    {
        // Hapus file jika ada
        if ($suratusaha->foto_ktp) {
            Storage::disk('public')->delete($suratusaha->foto_ktp);
        }
        if ($suratusaha->foto_usaha) {
            Storage::disk('public')->delete($suratusaha->foto_usaha);
        }

        $suratusaha->delete();
        return redirect()->route('suratusaha.index')->with('success', 'Data berhasil dihapus.');
    }
}
