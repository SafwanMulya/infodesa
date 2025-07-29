@extends('layout.header') {{-- Sesuaikan dengan layout Anda --}}

@section('content')
<div class="container">
    <h1>Daftar Pengajuan Surat Keterangan Domisili</h1>
    <a href="{{ route('suratdomisili.create') }}" class="btn btn-primary mb-3">Ajukan Surat Domisili Baru</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>NIK</th>
                <th>Alamat Sekarang</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($suratDomisilis as $surat)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $surat->nama_lengkap }}</td>
                <td>{{ $surat->nik }}</td>
                <td>{{ $surat->alamat_sekarang }}</td>
                <td>
                    <span class="badge {{ $surat->status == 'disetujui' ? 'bg-success' : ($surat->status == 'ditolak' ? 'bg-danger' : 'bg-warning') }}">
                        {{ $surat->status }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('suratdomisili.show', $surat->id) }}" class="btn btn-info btn-sm">Detail</a>
                    @if ($surat->status == 'dalam proses')
                        <a href="{{ route('suratdomisili.edit', $surat->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    @endif
                    <form action="{{ route('suratdomisili.destroy', $surat->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada pengajuan surat domisili.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
