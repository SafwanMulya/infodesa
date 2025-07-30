@extends('layout.app', ['title' => 'Daftar Informasi'])
@section('content')
    <div class="container shadow bg-white mt-5">

        <h5 class="mt-4 py-3">Daftar Semua Informasi</h5>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-success">
                    <tr>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Konten</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($informasi as $info)
                        <tr>
                            <td>{{ $info->judul }}</td>
                            <td>{{ \Carbon\Carbon::parse($info->tanggal)->format('d-m-Y') }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($info->konten, 100) }}</td>
                            <td>
                                <a href="{{ url('informasi/'.$info->id)}}" class="btn btn-warning btn-sm">
                                    Lihat
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data informasi ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
