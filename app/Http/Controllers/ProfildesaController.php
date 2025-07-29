<?php

namespace App\Http\Controllers;

use App\Models\profildesa;
use Illuminate\Http\Request;

class ProfildesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $singleProfil = profildesa::first();  // Ambil data pertama
    $isNew = is_null($singleProfil);      // True kalau belum ada data

    return view('admin.profil.index', compact('singleProfil', 'isNew'));
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.profil.create'); // arahkan ke resources/views/admin/profil/create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     */
 public function store(Request $request)
{
    // Cek apakah data sudah ada
    if (profildesa::count() > 0) {
        return redirect()->route('admin.profil.index')->with('error', 'Hanya boleh ada satu profil desa.');
    }

    // Validasi input
    $request->validate([
        'nama_desa' => 'required|string|max:255',
        'alamat_desa' => 'required|string|max:255',
        'kode_pos' => 'required|string|max:10',
        'telepon' => 'required|string|max:15',
        'email' => 'nullable|email|max:255',
        'luas_wilayah' => 'nullable|string|max:50',
        'kecamatan' => 'nullable|string|max:50',
        'kabupaten' => 'nullable|string|max:50',
        'provinsi' => 'nullable|string|max:50',
    ]);

    // Simpan ke database
    profildesa::create($request->all());

    return redirect()->route('admin.profil.index')->with('success', 'Profil Desa berhasil ditambahkan.');
}


    /**
     * Display the specified resource.
     */
    public function show(profildesa $profildesa)
    {
        return view('admin.profil.show', compact('profildesa')); // arahkan ke resources/views/admin/profil/show.blade.php
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(profildesa $profildesa)
    {
        return view('admin.profil.edit', compact('profildesa')); // arahkan ke resources/views/admin/profil/edit.blade.php
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateIndex(Request $request, $id)
{
    $request->validate([
        'nama_desa' => 'required|string|max:255',
        'alamat_desa' => 'required|string|max:255',
        'kode_pos' => 'required|string|max:10',
        'telepon' => 'required|string|max:15',
        'email' => 'nullable|email|max:255',
        'luas_wilayah' => 'nullable|string|max:50',
        'kecamatan' => 'nullable|string|max:50',
        'kabupaten' => 'nullable|string|max:50',
        'provinsi' => 'nullable|string|max:50',
    ]);

    $profildesa = profildesa::findOrFail($id);
    $profildesa->update($request->all());

    return redirect()->route('admin.profil.index')->with('success', 'Profil Desa berhasil diperbarui.');
}



    public function destroy(profildesa $profildesa)
    {
        $profildesa->delete();

        return redirect()->route('admin.profil.index')->with('success', 'Profil Desa deleted successfully.');
    }
}
