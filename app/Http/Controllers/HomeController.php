<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Hilder;
use App\Models\Layanan;
use App\Models\datadesa;
use App\Models\Penduduk;
use App\Models\Informasi;
use App\Models\Permohonan;
use App\Models\Profildesa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'penduduk' => Penduduk::all(),
            'agamas' => Agama::all(),
            'profilDesa' => Profildesa::latest()->first(),
            'hilder' => Hilder::latest()->first(), //
            'datadesa'=>datadesa::all(),
            'informasi'=>informasi::all(),
        ]);
    }
    public function informasi($id=null){
        if($id){
            $informasi = Informasi::findOrFail($id);
            return view('informasi.detail', compact('informasi'));
        }

        $data = [
            'informasi'=>Informasi::get()
        ];
        return view('informasi.index',$data);
    }
    function verify_surat($kode){
        $permohonan = Permohonan::where('kode_tiket', $kode)->first();
        return view('permohonan.verify', compact('permohonan'));
    }
        public function layanan($id=null){
        if($id){
            $layanan = Layanan::findOrFail($id);
            return view('layanan.detail', compact('layanan'));
        }
        
        $data = [
            'layanan'=>Layanan::get()
        ];
        return view('layanan.index',$data);
    }

          public function permohonan(Request $request,$id=null){
          
        if($id){
            $layanan = Layanan::findOrFail($id);
                if($request->isMethod('post')){
                    $data_permohonan = [];
                    if($kolom = config('form-layanan.'.$layanan->kode_layanan)){
                        foreach ($kolom as $key => $value) {
                            if($value['type']=='file'){
                                if($request->hasFile($value['kolom'])){
                                    $file = $request->file($value['kolom']);
                                    $filename = time() .'-'.$value['kolom']. '.' . $file->getClientOriginalExtension();
                                    $file->move(public_path('uploads'), $filename);
                                    $data_permohonan[$value['kolom']] = '/uploads/'.$filename;
                                }
                                continue;
                            }else{
                            $key = $value['kolom'];
                            $data_permohonan[$key] = $request->$key;
                            }
                           
                        }
                    }
                    $layanan->permohonan()->create([
                        'nik_pemohon'=>$request->nik,
                        'nama_pemohon'=>$request->nama_pemohon,
                        'alamat_pemohon'=>$request->alamat,
                        'nohp'=>$request->nohp,
                        'kode_tiket'=>str()->random(6),
                        'data_permohonan'=>$data_permohonan,
                    ]);
                    return back()->with('success','Permohonan berhasil diajukan');
            }
            return view('permohonan.form-pengajuan', compact('layanan'));
        }
   
    }

    
}
