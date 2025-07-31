<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Validasi Dokumen Surat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <div class="container py-5">
      <div class="card shadow-lg">
        <div class="card-body text-center">
       
          
          @if($permohonan && $permohonan->tte_pada)
             <img src="https://cdn-icons-png.flaticon.com/512/190/190411.png" alt="Valid Icon" width="100" class="mb-3">
          <h2 class="text-success">Dokumen Valid ✔️</h2>
          <p class="text-muted">Dokumen ini telah diverifikasi oleh sistem pelayanan desa.</p>

          <hr>

          <div class="text-start mt-4">
            <h5 class="mb-3">📄 Informasi Dokumen:</h5>
            <ul class="list-group">
              <li class="list-group-item"><strong>Jenis Surat:</strong> {{ $permohonan->layanan->nama }}</li>
              <li class="list-group-item"><strong>Nama:</strong> {{ $permohonan->nama_pemohon }}</li>
              <li class="list-group-item"><strong>NIK:</strong> {{Str::mask($permohonan->nik_pemohon,'*',-12,4) }}</li>
              <li class="list-group-item"><strong>Tanggal Diterbitkan:</strong> {{ $permohonan->tte_pada }}</li>
              <li class="list-group-item"><strong>Nomor Surat:</strong> {{ $permohonan->nomor_surat }}</li>
            </ul>
          </div>

          <div class="alert alert-success mt-4">
            Surat ini dikeluarkan secara sah oleh Pemerintah Desa Tameran.
          </div>
          @else 
               <img src="https://cdn-icons-png.flaticon.com/512/463/463612.png" alt="InValid Icon" width="100" class="mb-3">
            <div class="alert alert-warning mt-4">
            Maaf, Surat yang anda cari tidak ditemukan atau belum di sahkan oleh Pemerintah Desa Tameran.
          </div>
          @endif
        </div>
      </div>
    </div>
  </body>
</html>
