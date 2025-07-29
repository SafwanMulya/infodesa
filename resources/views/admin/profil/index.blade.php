

<!-- Konten admin Anda di sini -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Desa Tameran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

@include('admin.layout.header')

<div class="container mt-2">
    <h3 class="fw-bold mb-3">
        <span class="bi bi-house-gear-fill me-2"> Profil Desa</span>
    </h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row g-4">
        {{-- Form Tambah / Edit --}}
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-white bg-success fw-bold">
                    {{ $isNew ? 'Tambah Profil Desa' : 'Edit Profil Desa' }}
                </div>
                <div class="card-body">
                    @if ($isNew)
                        <form action="{{ route('admin.profil.store') }}" method="POST">
                            @csrf
                    @else
                        <form action="{{ route('admin.profil.updateInline', $singleProfil->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                    @endif

                        <div class="mb-3">
                            <input type="text" class="form-control" name="nama_desa" placeholder="Nama Desa" value="{{ old('nama_desa', $singleProfil->nama_desa ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="alamat_desa" placeholder="Alamat Desa" value="{{ old('alamat_desa', $singleProfil->alamat_desa ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="kode_pos" placeholder="Kode Pos" value="{{ old('kode_pos', $singleProfil->kode_pos ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="telepon" placeholder="No Telepon" value="{{ old('telepon', $singleProfil->telepon ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email', $singleProfil->email ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="luas_wilayah" placeholder="Luas Wilayah" value="{{ old('luas_wilayah', $singleProfil->luas_wilayah ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="kecamatan" placeholder="Kecamatan" value="{{ old('kecamatan', $singleProfil->kecamatan ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="kabupaten" placeholder="Kabupaten" value="{{ old('kabupaten', $singleProfil->kabupaten ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="provinsi" placeholder="Provinsi" value="{{ old('provinsi', $singleProfil->provinsi ?? '') }}">
                        </div>

                        <button type="submit" class="btn btn-primary shadow-sm">
                            {{ $isNew ? 'Simpan' : 'Update' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Tabel Profil --}}
        @if (!$isNew)
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-success text-white fw-bold">Data Profil Desa</div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <tr><th>Nama Desa</th><td>{{ $singleProfil->nama_desa }}</td></tr>
                        <tr><th>Alamat</th><td>{{ $singleProfil->alamat_desa }}</td></tr>
                        <tr><th>Kode Pos</th><td>{{ $singleProfil->kode_pos }}</td></tr>
                        <tr><th>Telepon</th><td>{{ $singleProfil->telepon }}</td></tr>
                        <tr><th>Email</th><td>{{ $singleProfil->email }}</td></tr>
                        <tr><th>Luas Wilayah</th><td>{{ $singleProfil->luas_wilayah }}</td></tr>
                        <tr><th>Kecamatan</th><td>{{ $singleProfil->kecamatan }}</td></tr>
                        <tr><th>Kabupaten</th><td>{{ $singleProfil->kabupaten }}</td></tr>
                        <tr><th>Provinsi</th><td>{{ $singleProfil->provinsi }}</td></tr>
                        <tr>
                    </table>
                        <form action="{{ route('admin.profil.destroy', $singleProfil->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mt-2">Hapus Profil</button>
                        </form>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
