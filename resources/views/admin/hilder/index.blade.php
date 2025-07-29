
    @extends('admin.layout.app',['title'=>'Hilder'])
    @section('content')
    <div class="container mt-4">
        <h2 class="fw-bold mb-4"><i class="bi bi-images"></i> Data Hilder</h2>

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
                        {{ isset($hilder) ? 'Edit Data Hilder' : 'Tambah Data Hilder' }}
                    </div>
                    <div class="card-body">
                        <form
                            action="{{ isset($hilder) ? route('admin.hilder.update', $hilder->id) : route('admin.hilder.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($hilder)) @method('PUT') @endif

                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" name="judul" class="form-control"
                                    value="{{ old('judul', $hilder->judul ?? '') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="isi" class="form-label">Isi</label>
                                <textarea name="isi" class="form-control" rows="4" required>{{ old('isi', $hilder->isi ?? '') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control"
                                    value="{{ old('alamat', $hilder->alamat ?? '') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar</label>
                                <input type="file" name="gambar" class="form-control">
                                @if(isset($hilder) && $hilder->gambar)
                                    <img src="{{ asset($hilder->gambar) }}" alt="Gambar" class="img-thumbnail mt-2" width="150">
                                @endif
                            </div>

                            <button type="submit" class="btn btn-{{ isset($hilder) ? 'primary' : 'success' }}">
                                {{ isset($hilder) ? 'Update' : 'Simpan' }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Tabel --}}
            <div class="col-12 col-md-6 mb-4">
                @if($hilders->count())
                    <div class="card shadow">
                        <div class="card-header bg-success text-white">Data Saat Ini</div>
                        <div class="card-body table-responsive">
                            <table class="table table-bordered align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($hilders as $i => $item)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>
                                                <strong>{{ $item->judul }}</strong><br>
                                                <small>{{ $item->alamat }}</small><br>
                                                <span class="text-muted small d-block">{{ $item->isi }}</span>
                                            </td>
                                            <td>
                                                @if($item->gambar)
                                                    <img src="{{ asset($item->gambar) }}" alt="Gambar" class="img-fluid rounded" style="max-width: 80px;">
                                                @else
                                                    <small class="text-muted">Tidak ada</small>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.hilder.destroy', $item->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Yakin hapus data?')"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="bi bi-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="alert alert-warning">Belum ada data.</div>
                @endif
            </div>
        </div>
    </div>
@endsection