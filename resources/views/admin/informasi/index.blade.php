<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body class="bg-light">
    @include('admin.layout.header')

    <div class="container mt-4">
        <h3 class="fw-bold mb-3">
            <i class="bi bi-megaphone-fill me-2"></i> Informasi
        </h3>

        <div class="row">
            <!-- Form Tambah Informasi -->
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header bg-success text-white fw-bold">
                        Tambah Informasi
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.informasi.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="judul" class="form-control" placeholder="Judul Informasi" required>
                            </div>
                            <div class="mb-3">
                                <input type="date" name="tanggal" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="konten" class="form-label">Isi Pengumuman <span class="text-danger">*</span></label>
                                <textarea name="konten" id="konten" class="form-control" required>{{ old('konten') }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary shadow-sm">Simpan Informasi</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Daftar Informasi -->
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header bg-success text-white fw-bold d-flex justify-content-between align-items-center">
                        <span>Daftar Informasi Terkini</span>

                        <!-- Form Pencarian Tanggal -->
                        <form action="{{ route('admin.informasi.index') }}" method="GET" class="d-flex align-items-center">
                            <input type="date" name="tanggal" class="form-control form-control-sm me-2"
                                   value="{{ request('tanggal') }}">
                            <button type="submit" class="btn btn-light btn-sm text-success fw-bold">
                                Cari
                            </button>
                        </form>
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
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
                                        <td>{{ Str::limit(strip_tags($info->konten), 100) }}</td>
                                        <td>
                                            <a href="{{ route('admin.informasi.edit', $info->id) }}" class="btn btn-warning btn-sm mb-1">Edit</a>
                                            <form action="{{ route('admin.informasi.destroy', $info->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">Tidak ada informasi ditemukan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- CKEditor Script -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
</body>
</html>
