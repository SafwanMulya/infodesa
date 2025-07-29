@extends('layout.header')

@section('content')
<div class="container">
    <h1>Detail Surat Keterangan Domisili</h1>
    <div class="card">
        <div class="card-header">
            Informasi Pemohon
        </div>
        <div class="card-body">
            <p><strong>Nama Lengkap:</strong> {{ $suratDomisili->nama_lengkap }}</p>
            <p><strong>NIK:</strong> {{ $suratDomisili->nik }}</p>
            <p><strong>Tempat, Tanggal Lahir:</strong> {{ $suratDomisili->tempat_tanggal_lahir }}</p>
            <p><strong>Jenis Kelamin:</strong> {{ $suratDomisili->jenis_kelamin }}</p>
            <p><strong>Kewarganegaraan:</strong> {{ $suratDomisili->kewarganegaraan }}</p>
            <p><strong>Agama:</strong> {{ $suratDomisili->agama }}</p>
            <p><strong>Pekerjaan:</strong> {{ $suratDomisili->pekerjaan }}</p>
            <p><strong>Alamat Sebelumnya:</strong> {{ $suratDomisili->alamat_sebelumnya ?? '-' }}</p>
            <p><strong>Alamat Sekarang:</strong> {{ $suratDomisili->alamat_sekarang }}</p>
            <p><strong>Nomor HP:</strong> {{ $suratDomisili->no_hp }}</p>
            <p><strong>Email:</strong> {{ $suratDomisili->email ?? '-' }}</p>
            <p><strong>Status:</strong>
                <span class="badge {{ $suratDomisili->status == 'disetujui' ? 'bg-success' : ($suratDomisili->status == 'ditolak' ? 'bg-danger' : 'bg-warning') }}">
                    {{ $suratDomisili->status }}
                </span>
            </p>
            @if ($suratDomisili->foto_ktp)
                <p><strong>Foto KTP:</strong> <br><img src="{{ asset('storage/' . $suratDomisili->foto_ktp) }}" alt="Foto KTP" width="200"></p>
            @endif
            @if ($suratDomisili->foto_kk)
                <p><strong>Foto KK:</strong> <br><img src="{{ asset('storage/' . $suratDomisili->foto_kk) }}" alt="Foto KK" width="200"></p>
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('suratdomisili.index') }}" class="btn btn-secondary">Kembali</a>
            @if ($suratDomisili->status == 'disetujui')
                <a href="{{ route('admin.suratdomisili.cetak', $suratDomisili->id) }}" class="btn btn-success" target="_blank">Cetak Surat</a>
            @endif
        </div>
    </div>
</div>
@endsection
