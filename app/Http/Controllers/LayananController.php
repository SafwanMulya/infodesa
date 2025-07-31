<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
         $layanans  = Layanan::withCount('permohonan')->paginate(10);
         $layanan = null;
          return view('admin.layanan.index', compact('layanans','layanan'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $layanan = Layanan::create($request->all());
       if($request->file('template_surat')){

            $file = $request->file('template_surat');
            $filename = $layanan->id.'.'.$file->getClientOriginalExtension();
            $file->move(public_path('template_surat'), $filename);
            $layanan->template_surat = 'template_surat/' . $filename;
            $layanan->save();
        }
        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Layanan $layanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Layanan $layanan)
    {
        $layanans  = Layanan::withCount('permohonan')->paginate(2);
         $layanan = $layanan;
          return view('admin.layanan.index', compact('layanans','layanan'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Layanan $layanan)
    {
        $layanan->update($request->all());
           if($request->file('template_surat')){

            $file = $request->file('template_surat');
            $filename = $layanan->id.'.'.$file->getClientOriginalExtension();
            $file->move(public_path('template_surat'), $filename);
            $layanan->template_surat = 'template_surat/' . $filename;
            $layanan->save();
        }
        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Layanan $layanan)
    {
        $layanan->delete();
        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil dihapus');
    }
}
