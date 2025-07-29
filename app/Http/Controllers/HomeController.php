<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Hilder;
use App\Models\Layanan;
use App\Models\datadesa;
use App\Models\Penduduk;
use App\Models\Informasi;
use App\Models\Permohonan;
use App\Models\ProfilDesa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'penduduk' => Penduduk::all(),
            'agamas' => Agama::all(),
            'profilDesa' => ProfilDesa::latest()->first(),
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
                            $key = $value['kolom'];
                            $data_permohonan[$key] = $request->$key;
                        }
                    }
                    $layanan->permohonan()->create([
                        'nik'=>$request->nik,
                        'nama_pemohon'=>$request->nama_pemohon,
                        'alamat'=>$request->alamat,
                        'nohp'=>$request->nohp,
                        'data_permohonan'=>$data_permohonan,
                    ]);
                    return back()->with('success','Permohonan berhasil diajukan');
            }
            return view('permohonan.form-pengajuan', compact('layanan'));
        }
   
    }

    
}
