<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;

class PermohonanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $permohonans  = Permohonan::with('layanan')->paginate(10);
         $permohonan = null;
          return view('admin.permohonan.index', compact('permohonans','permohonan'));

    }

    function cetak_permohonan(Request $request, Permohonan $permohonan){
        $templateProcessor = new TemplateProcessor($permohonan->layanan->template_surat);
        $templateProcessor->setValue('nama_pemohon', $permohonan->nama_pemohon);
        $pathToSave = public_path('hasil_cetak/' . $permohonan->id . '.docx');
        $templateProcessor->saveAs($pathToSave);
        return response()->download($pathToSave)->deleteFileAfterSend(true);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Permohonan $permohonan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permohonan $permohonan)
    {
         $permohonan = $permohonan;
          return view('admin.permohonan.detail', compact('permohonan'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permohonan $permohonan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permohonan $permohonan)
    {
        //
    }
}
