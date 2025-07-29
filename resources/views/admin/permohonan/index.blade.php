
    @extends('admin.layout.app',['title'=>'Hilder'])
    @section('content')
    <div class="container mt-4">
        <h2 class="fw-bold mb-4"><i class="bi bi-table"></i> Data Permohonan</h2>

        {{-- Notifikasi --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="row">
            {{-- Tabel --}}
            <div class="col-12 col-md-12 mb-4">
                @if($permohonans->count())
                    <div class="card shadow">
                        <div class="card-header bg-success text-white">Data Saat Ini</div>
                        <div class="card-body table-responsive">
                            <table class="table table-bordered align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Data Pemohon</th>
                                        <th>Jenis Layanan</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($permohonans as $i => $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                               <b>{{ $item->nama_pemohon }}</b><br>
                                                  <small>{{ $item->nip }}</small><br>
                                                  <small>{{ $item->alamat }}</small><br>
                                                  <small>{{ $item->nohp }}</small>
                                               
                                            </td>
                                            <td>
                                            {{$item->layanan->nama}}
                                            </td>
                                               <td>
                                            {{$item->created_at->format('d-m-Y')}}
                                            </td>
                                            <td>
                                           dicetak
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                <a href="{{ route('admin.permohonan.edit',$item->id) }}" class="d-line btn btn-sm btn-warning">Detail</a>
                                                <form action="{{ route('admin.permohonan.destroy', $item->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Yakin hapus data?')"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="bi bi-trash"></i> Hapus
                                                    </button>
                                                </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $permohonans->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                @else
                    <div class="alert alert-warning">Belum ada data.</div>
                @endif
            </div>
        </div>
    </div>
@endsection