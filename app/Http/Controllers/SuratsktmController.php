<?php

namespace App\Http\Controllers;

use App\Models\Suratsktm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class SuratsktmController extends Controller
{
    public function index()
    {
        $suratsktms = Suratsktm::all();
        return view('suratsktm.index', compact('suratsktms'));
    }

    public function create()
    {
        return view('suratsktm.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nik' => 'required',
            'tempat_tanggal_lahir' => 'required',
            'kewarganegaraan' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',

            'nama_ayah' => 'required',
            'nik_ayah' => 'required',
            'ttl_ayah' => 'required',
            'kewarganegaraan_ayah' => 'required',
            'agama_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'alamat_ayah' => 'required',

            'nama_ibu' => 'required',
            'nik_ibu' => 'required',
            'ttl_ibu' => 'required',
            'kewarganegaraan_ibu' => 'required',
            'agama_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'alamat_ibu' => 'required',

            'foto_ktp' => 'image|mimes:jpg,jpeg,png|max:2048',
            'foto_kk' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto_ktp')) {
            $data['foto_ktp'] = $request->file('foto_ktp')->store('ktp', 'public');
        }

        if ($request->hasFile('foto_kk')) {
            $data['foto_kk'] = $request->file('foto_kk')->store('kk', 'public');
        }

        $data['status'] = 'proses';
        Suratsktm::create($data);

        $token = '8422187959:AAFDtl66RS0eIzA5q3xbTe4YuY8nq4-p0pk';
        $chat_id = '7036979716';

        $text = "📄 Notifikasi SKTM Baru\n"
              . "👤 Pemohon: {$data['nama_lengkap']}\n"
              . "📞 No HP: {$data['no_hp']}\n"
              . "📍 Alamat: {$data['alamat']}\n"
              . "👨 Ayah: {$data['nama_ayah']}\n"
              . "👩 Ibu: {$data['nama_ibu']}";

        Http::get("https://api.telegram.org/bot{$token}/sendMessage", [
            'chat_id' => $chat_id,
            'text' => $text
        ]);

        return redirect()->route('suratsktm.index')->with('success', 'Data SKTM berhasil dikirim,tunggu admin sedang proses,file via PDF akan dikirm ke alamat nomo telepon anda.');
    }

    public function show(Suratsktm $suratsktm)
    {
        return view('suratsktm.show', compact('suratsktm'));
    }

    public function edit(Suratsktm $suratsktm)
    {
        return view('suratsktm.edit', compact('suratsktm'));
    }

    public function update(Request $request, Suratsktm $suratsktm)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|max:20',
            'tempat_tanggal_lahir' => 'required|string|max:255',
            'kewarganegaraan' => 'required|string|max:255',
            'agama' => 'required|string|max:100',
            'pekerjaan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:20',

            'nama_ayah' => 'required|string|max:255',
            'nik_ayah' => 'required|string|max:20',
            'ttl_ayah' => 'required|string|max:255',
            'kewarganegaraan_ayah' => 'required|string|max:255',
            'agama_ayah' => 'required|string|max:100',
            'pekerjaan_ayah' => 'required|string|max:255',
            'alamat_ayah' => 'required|string',

            'nama_ibu' => 'required|string|max:255',
            'nik_ibu' => 'required|string|max:20',
            'ttl_ibu' => 'required|string|max:255',
            'kewarganegaraan_ibu' => 'required|string|max:255',
            'agama_ibu' => 'required|string|max:100',
            'pekerjaan_ibu' => 'required|string|max:255',
            'alamat_ibu' => 'required|string',
        ]);

        $suratsktm->update($validated);

        return redirect()->route('suratsktm.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(Suratsktm $suratsktm)
    {
        if ($suratsktm->foto_ktp && Storage::disk('public')->exists($suratsktm->foto_ktp)) {
            Storage::disk('public')->delete($suratsktm->foto_ktp);
        }

        if ($suratsktm->foto_kk && Storage::disk('public')->exists($suratsktm->foto_kk)) {
            Storage::disk('public')->delete($suratsktm->foto_kk);
        }

        $suratsktm->delete();

        return redirect()->route('suratsktm.index')->with('success', 'Data berhasil dihapus');
    }

    public function cetak($id)
    {
        $data = Suratsktm::findOrFail($id);
        $pdf = Pdf::loadView('admin.adminsktm.pdf', compact('data'));
        return $pdf->stream('sktm_' . $data->nama_lengkap . '.pdf');
    }

    public function konfirmasi($id)
    {
        $sktm = Suratsktm::findOrFail($id);
        $sktm->status = 'disetujui';
        $sktm->save();

        return back()->with('success', 'Data berhasil dikonfirmasi');
    }

    public function status($id)
    {
        $sktm = Suratsktm::findOrFail($id);
        return view('suratsktm.status', compact('sktm'));
    }
}
