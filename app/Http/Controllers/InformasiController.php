<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Komentar;
use Illuminate\Http\Request;


class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{
    $query = Informasi::query();

    if ($request->has('tanggal') && $request->tanggal) {
        $query->whereDate('tanggal', $request->tanggal);
    }

    $informasi = $query->orderBy('tanggal', 'desc')->get();

    return view('admin.informasi.index', compact('informasi'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.informasi.create'); // Arahkan ke view untuk membuat informasi baru
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'tanggal' => 'required|date',
        'konten' => 'required|string',
    ]);

    Informasi::create([
        'judul' => $request->judul,
        'tanggal' => $request->tanggal,
        'konten' => $request->konten,
    ]);

    return redirect()->back()->with('success', 'Informasi berhasil disimpan.');
}


    /**
     * Display the specified resource.
     */
 public function show($id, Request $request)
{
    // Pastikan memanggil with('komentars')
    $informasi = Informasi::with('komentars')->findOrFail($id);

    $query = Informasi::query();
    if ($request->filled('tanggal')) {
        $query->whereDate('tanggal', $request->tanggal);
    }
    if ($request->filled('bulan')) {
        $query->whereMonth('tanggal', $request->bulan);
    }
    if ($request->filled('tahun')) {
        $query->whereYear('tanggal', $request->tahun);
    }

    $semuaInformasi = $query->orderBy('tanggal', 'desc')->get();
    return view('informasi.detail', compact('informasi', 'semuaInformasi'));
}




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Informasi $informasi)
    {
        return view('admin.informasi.edit', compact('informasi')); // Arahkan ke view dengan data informasi
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Informasi $informasi)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'konten' => 'required|string',
        ]);

        // Update data informasi
        $informasi->update($request->all());

        return redirect()->route('admin.informasi.index')->with('success', 'Informasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Informasi $informasi)
    {
        // Hapus data informasi
        $informasi->delete();

        return redirect()->route('admin.informasi.index')->with('success', 'Informasi berhasil dihapus.');
    }
    public function all()
    {
    $informasi = Informasi::latest()->get(); // atau paginate jika banyak
    return view('informasi.detail', compact('informasi'));
    }
    public function semua()
    {
    $informasi = Informasi::latest()->get(); // Ambil semua data informasi
    return view('informasi.detail', compact('informasi'));
    }


}
