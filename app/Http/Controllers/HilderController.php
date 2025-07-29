<?php

namespace App\Http\Controllers;

use App\Models\Hilder;
use Illuminate\Http\Request;

class HilderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index(Request $request)
{
    $hilders = Hilder::all();

    // Ambil data untuk diedit dari parameter URL jika ada
    $hilder = null;
    if ($request->has('edit')) {
        $hilder = Hilder::find($request->edit);
    } elseif ($hilders->count() === 1) {
        // Jika hanya ada satu data, otomatis pakai data itu
        $hilder = $hilders->first();
    }

    return view('admin.hilder.index', compact('hilders', 'hilder'));
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hilder.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    if (Hilder::count() >= 1) {
        return redirect()->route('admin.hilder.index')->with('error', 'Data hanya boleh satu.');
    }

    $request->validate([
        'judul' => 'required|string|max:255',
        'isi' => 'required',
        'alamat' => 'required|string|max:255',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $data = $request->only('judul', 'isi', 'alamat');

    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/hilder'), $filename);
        $data['gambar'] = 'uploads/hilder/' . $filename;
    }

    Hilder::create($data);

    return redirect()->route('admin.hilder.index')->with('success', 'Data berhasil disimpan.');
}


    /**
     * Display the specified resource.
     */
    public function show(Hilder $hilder)
    {
        return view('hilder.show', compact('hilder'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hilder $hilder)
    {
        return view('hilder.edit', compact('hilder'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Hilder $hilder)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'isi' => 'required',
        'alamat' => 'required|string|max:255',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $data = $request->only('judul', 'isi', 'alamat');

    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/hilder'), $filename);
        $data['gambar'] = 'uploads/hilder/' . $filename;
    }

    $hilder->update($data);

    return redirect()->route('admin.hilder.index')->with('success', 'Data berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $hilder = Hilder::findOrFail($id);

    // Hapus file gambar dari folder
    $gambarPath = public_path('uploads/hilder/' . $hilder->gambar);
    if (file_exists($gambarPath)) {
        unlink($gambarPath);
    }

    // Hapus data dari database
    $hilder->delete();

    return redirect()->back()->with('success', 'Data berhasil dihapus.');
}

}
