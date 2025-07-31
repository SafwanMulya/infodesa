<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use Illuminate\Http\Request;

class AgamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $agamas = Agama::all();
    $isNew = $agamas->count() == 0;
    $singleAgama = $agamas->first();

    // Statistik total
    $statistik = [
        'islam'    => $agamas->sum('islam'),
        'kristen'  => $agamas->sum('kristen'),
        'katolik'  => $agamas->sum('katolik'),
        'hindu'    => $agamas->sum('hindu'),
        'budha'    => $agamas->sum('budha'),
        'konghucu' => $agamas->sum('konghucu'),
    ];

    return view('admin.agama.index', compact('agamas', 'isNew', 'singleAgama', 'statistik'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $isNew = true; // Menandakan bahwa ini adalah form untuk menambah data baru
        return view('admin.agama.create', compact('isNew')); // Arahkan ke view untuk membuat agama baru
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'islam' => 'required|integer',
            'kristen' => 'required|integer',
            'katolik' => 'required|integer',
            'hindu' => 'required|integer',
            'budha' => 'required|integer',
            'konghucu' => 'required|integer',
        ]);

        // Simpan data agama
        agama::create($request->all());

        return redirect()->route('admin.agama.index')->with('success', 'Agama berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agama $agama)
    {
        $isNew = false; // Menandakan bahwa ini adalah form untuk mengedit data
        return view('admin.agama.edit', compact('agama', 'isNew')); // Arahkan ke view dengan data agama
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agama $agama)
    {
        // Validasi input
        $request->validate([
            'islam' => 'required|integer',
            'kristen' => 'required|integer',
            'katolik' => 'required|integer',
            'hindu' => 'required|integer',
            'budha' => 'required|integer',
            'konghucu' => 'required|integer',
        ]);

        // Update data agama
        $agama->update($request->all());

        return redirect()->route('admin.agama.index')->with('success', 'Agama berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agama $agama)
    {
        // Hapus data agama
        $agama->delete();

        return redirect()->route('admin.agama.index')->with('success', 'Agama berhasil dihapus.');
    }
}
