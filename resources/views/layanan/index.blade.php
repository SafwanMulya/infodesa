@extends('layout.app', ['title' => 'Daftar Layanan'])
@section('content')
    <div class="container shadow bg-white mt-5">

        <h5 class="mt-4 py-3">Daftar Semua Layanan Surat Desa Tameran</h5>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-success">
                    <tr>
                        <th>Nama</th>
                        <th>Keterangan</th>
                        <th>Jumlah Pemohon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($layanan as $info)
                        <tr>
                            <td>{{ $info->nama }}</td>
                            <td>{{ $info->keterangan }}</td>
                            <td>{{ $info->permohonan_count }}</td>
                            <td style="width:250px">
                              <div class="btn-group">
                                  <a href="{{ url('layanan/'.$info->id)}}" class="btn btn-warning btn-sm">
                                    Detail
                                </a>
                                  <a href="{{ url('permohonan-layanan/'.$info->id)}}" class="btn btn-primary btn-sm">
                                    Ajukan Permohonan
                                </a>
                              </div>
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