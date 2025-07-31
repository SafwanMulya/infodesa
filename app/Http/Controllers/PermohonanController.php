<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PermohonanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permohonans  = Permohonan::with('layanan')->paginate(10);
        $permohonan = null;
        return view('admin.permohonan.index', compact('permohonans', 'permohonan'));
    }
    function generate_qr($kode)
    {
        $qrCodePath = '/qrcodes/' . $kode . '.png';
        $fullPath = Storage::path($qrCodePath);
        if (!file_exists(dirname($fullPath))) {
            mkdir(dirname($fullPath), 0755, true);
        }
        QrCode::format('png')->size(200)->generate(route('verify_surat', $kode), $fullPath);
        return $fullPath;
    }
    public function simpanPdfDariBase64($base64String)
{
    // Jika base64 diawali dengan prefix seperti: data:application/pdf;base64,...
    if (preg_match('/^data:application\/pdf;base64,/', $base64String)) {
        $base64String = substr($base64String, strpos($base64String, ',') + 1);
    }

    $base64String = str_replace(' ', '+', $base64String); // hindari error spasi

    $pdfContent = base64_decode($base64String);

    if ($pdfContent === false) {
        return response()->json(['status' => 'gagal', 'message' => 'Base64 tidak valid']);
    }

    // Simpan ke storage/app/public/pdf/hasil.pdf
    $namaFile = Str::uuid().'.pdf';
    File::put(public_path('hasil_tte/'.$namaFile), $pdfContent);

    return 'hasil_tte/'.$namaFile;
}
    function ttd_permohonan(Request $request, Permohonan $permohonan)
    {
        if($request->ulangi_tte){
            if(is_file(public_path($permohonan->surat_tte))){
                File::delete(public_path($permohonan->surat_tte));
            }
            $permohonan->update([
                'surat_tte' => null,
                'tte_pada' => null,
            ]);
            return back()->with('success', 'Tanda tangan elektronik berhasil dibatalkan.');
        }
      // 1. Lokasi file tanda tangan dan file PDF
    $pdfPath      = public_path($permohonan->surat_pdf); // Pastikan ini adalah path ke file PDF yang sudah ada

    // 2. Encode ke base64

    $pdfBase64       = base64_encode(file_get_contents($pdfPath));
    // 3. Siapkan payload JSON
    $payload = [
        "nik" => $request->nik_pejabat,
        "passphrase" => $request->passphrase,
        "signatureProperties" => [[
            "tampilan" => "INVISIBLE"
        ]],
        "file" => [$pdfBase64]
    ];
    // 4. Kirim request POST dengan Basic Auth
    $response = Http::withBasicAuth(config('tte.username_api'), config('tte.password_api'))
        ->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])
        ->post(config('tte.endpoint_api').'/api/v2/sign/pdf', $payload);
    if ($response->successful()) {
        $permohonan->update([
            'surat_tte' => $this->simpanPdfDariBase64($response->json()['file'][0]),
            'tte_pada' => now(),
        ]);
        return back()->with('success', 'Surat berhasil ditandatangani.');
    } else {
        return back()->with('error', 'Gagal menandatangani surat: ' . $response->body());
    }
}
    
    function cetak_permohonan(Request $request, Permohonan $permohonan)
    {
        $templateProcessor = new TemplateProcessor(public_path($permohonan->layanan->template_surat));
        $templateProcessor->setValue('nama_pemohon', $permohonan->nama_pemohon);
        $data = [];
        if ($field = config('form-layanan.' . $permohonan->layanan->kode_layanan)) {
            foreach ($field as $key => $value) {
                $data[$value['kolom']] = $permohonan->data_permohonan[$value['kolom']] ?? '';
            }
        }
        $data = array_merge($data, [
            'nik_pemohon' => $permohonan->nik_pemohon,
            'alamat_pemohon' => $permohonan->alamat_pemohon,
            'nohp_pemohon' => $permohonan->nohp,
            'nama_pemohon' => $permohonan->nama_pemohon,
            'nama_pejabat' => $request->nama_pejabat ?? null,
            'tgl_cetak' => date('m F Y',strtotime($request->tanggal_cetak)) ?? null,
            'nomor_surat' => $request->nomor_surat ?? null,
        ]);
        $permohonan->update([
            'surat_docx' => '/hasil_cetak/' . $permohonan->kode_tiket . '.docx',
            'surat_pdf' => '/hasil_cetak/' . $permohonan->kode_tiket . '.pdf',
            'tanggal_cetak' => now(),
            'nomor_surat' => $request->nomor_surat,
        ]);
        $templateProcessor->setValues($data);
        $templateProcessor->setImageValue('tte', array('path' => $this->generate_qr($permohonan->kode_tiket), 'width' => 80, 'height' => 80, 'ratio' => false));
        $pathToSave = public_path('hasil_cetak/' . $permohonan->kode_tiket . '.docx');
        File::put(Storage::path('docxtopdf/' . $permohonan->kode_tiket . '.txt'),$pathToSave ); $templateProcessor->saveAs($pathToSave);
        return back()->with('success', 'Surat berhasil dibuat.');
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
