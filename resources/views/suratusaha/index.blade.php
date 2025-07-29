<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Usaha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h3 class="fw-bold mb-3">
        <i class="bi bi-briefcase-fill me-2"></i> Data Surat Usaha
        <a href="{{ url('/admin/datadesa') }}" class="btn btn-primary float-end shadow">Kembali</a>
    </h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Form Input -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Form Input Surat Usaha</div>
        <div class="card-body">
            <form action="{{ route('suratusaha.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label>NIK</label>
                        <input type="text" name="nik" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label>Tempat Tanggal Lahir</label>
                        <input type="text" name="tempat_tanggal_lahir" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="">-- Pilih --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label>Kewarganegaraan</label>
                        <input type="text" name="kewarganegaraan" class="form-control" value="Indonesia" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label>Agama</label>
                        <input type="text" name="agama" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label>Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label>No HP</label>
                        <input type="text" name="no_hp" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" rows="2" required></textarea>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label>Nama Usaha</label>
                        <input type="text" name="nama_usaha" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label>Jenis Usaha</label>
                        <input type="text" name="jenis_usaha" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label>Waktu Usaha</label>
                        <input type="text" name="waktu_usaha" class="form-control" required>
                    </div>
                     <div class="col-md-6 mb-2">
                        <label>Upload Foto KTP (JPG/PNG)</label>
                        <input type="file" name="foto_ktp" class="form-control" accept="image/*" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label>Upload Foto KK (JPG/PNG)</label>
                        <input type="file" name="foto_usaha" class="form-control" accept="image/*" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-3">Simpan Data</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
