
    @extends('admin.layout.app',['title'=>'Permohonan Layanan'])
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
                    <div class="card shadow">
                        <div class="card-header bg-success text-white">Data Saat Ini</div>
                        <form action="{{ URL::full() }}" action="get" class="row g-3 p-3">
                                  <div class="col-auto">
                                    <small>Dari tanggal</small>
                                <input type="date" name="from_date" class="form-control"
                                   
                                    value="{{ request('from_date') }}">
                            </div>
                                 <div class="col-auto">
                                    <small>Sampai tanggal</small>

                                <input type="date" name="to_date" class="form-control"
                                   
                                    value="{{ request('to_date') }}">
                            </div>
                            <div class="col-auto">
                                <small>Cari</small>
                                <input type="text" name="cari" class="form-control"
                                    placeholder="Cari berdasarkan nama pemohon atau kode tiket"
                                    value="{{ request('cari') }}">
                            </div>
                         
                            <div class="col-auto">
                                <b>&nbsp;</b>
                                <button type="submit" class="btn btn-primary mt-4">
                                   <i class="bi bi-search"></i> Cari</button>
                            </div>
   <div class="col-auto">
                               <b>&nbsp;</b>
                                <button type="submit" name="cetak" value="true" class="btn btn-success mt-4"> <i class="bi bi-printer"></i> Cetak</button>
                            </div>
                        </form>
                @if($permohonans->count())

                        <div class="card-body table-responsive">
                            <table class="table table-bordered align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Tiket</th>
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
                                            <td align="center">{{ ($permohonans->currentPage() - 1) * $permohonans->perPage() + $loop->iteration }}</td>
                                            <td><b>{{ $item->kode_tiket }}</b></td>
                                            <td>
                                               <b>{{ $item->nama_pemohon }}</b><br>
                                                  <small>{{ $item->nip_pemohon }}</small><br>
                                                  <small>{{ $item->alamat_pemohon }}</small><br>
                                                  <small>{{ $item->nohp }}</small>
                                               
                                            </td>
                                            <td>
                                            {{$item->layanan->nama}}
                                            </td>
                                               <td>
                                            {{$item->created_at->format('d-m-Y')}}
                                            </td>
                                            <td>
                                           @if($item->tte_pada)
                                                <span class="badge bg-success">Selesai</span>
                                            @else
                                                <span class="badge bg-warning">Dalam Proses</span>
                                            @endif
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
                         @else
                    <div class="alert alert-warning m-4">Belum ada data.</div>
                @endif
                    </div>
               
            </div>
        </div>
    </div>
@endsection