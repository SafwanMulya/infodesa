
    @extends('admin.layout.app',['title'=>'Hilder'])
    @section('content')
    <div class="container mt-4">
        <h2 class="fw-bold mb-4"><i class="bi bi-table"></i> Data Layanan</h2>

        {{-- Notifikasi --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="row">
            {{-- Form --}}
            <div class="col-12 col-md-6 mb-4">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        {{ isset($layanan) ? 'Edit Data Layanan' : 'Tambah Data Layanan' }}
                    </div>
                    <div class="card-body">
                        <form
                            action="{{ isset($layanan) ? route('admin.layanan.update', $layanan->id) : route('admin.layanan.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($layanan)) @method('PUT') @endif

                            <div class="mb-3">
                                <label for="judul" class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control"
                                    value="{{ old('nama', $layanan->nama ?? '') }}" required>
                            </div>
   <div class="mb-3">
                                <label for="judul" class="form-label">Kode</label>
                                <input type="text" name="kode_layanan" class="form-control"
                                    value="{{ old('kode_layanan', $layanan->kode_layanan ?? '') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="isi" class="form-label">Keterangan</label>
                                <textarea name="keterangan" class="form-control" rows="4" required>{{ old('keterangan', $layanan->keterangan ?? '') }}</textarea>
                            </div>

                           <div class="mb-3">
                                <label for="judul" class="form-label">Template Surat (.docx)</label>
                                <input type="file" name="template_surat" class="form-control"
                                    required>
                            </div>

                       

                            <button type="submit" class="btn btn-{{ isset($layanan) ? 'primary' : 'success' }}">
                                {{ isset($layanan) ? 'Update' : 'Simpan' }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Tabel --}}
            <div class="col-12 col-md-6 mb-4">
                @if($layanans->count())
                    <div class="card shadow">
                        <div class="card-header bg-success text-white">Data Saat Ini</div>
                        <div class="card-body table-responsive">
                            <table class="table table-bordered align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Keterangan</th>
                                        <th>Jumlah Permohonan</th>
                                        <th>Template</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($layanans as $i => $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <strong>{{ $item->nama }}</strong><br>
                                               
                                            </td>
                                            <td>
                                            {{$item->keterangan}}
                                            </td>
                                               <td>
                                            {{$item->permohonan_count}}
                                            </td>
                                                  <td>
                                            @if(is_file(public_path($item->template_surat)))
                                                <a href="{{ asset($item->template_surat) }}" class="text-decoration-none">Download Template</a>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                <a href="{{ route('admin.layanan.edit',$item->id) }}" class="d-line btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('admin.layanan.destroy', $item->id) }}"
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

                            {{ $layanans->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                @else
                    <div class="alert alert-warning">Belum ada data.</div>
                @endif
            </div>
        </div>
    </div>
@endsection