<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-light">
    @include('admin.layout.header')

    <div class="container mt-2">
        <h3 class="fw-bold mb-3">
            <i class="bi bi-database-fill me-2"></i> Data Desa
        </h3>

        {{-- Flash Message --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="row g-4">
            {{-- Form Tambah / Edit Data Desa --}}
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-white bg-success fw-bold">
                        {{ $isNew ? 'Tambah Data Desa' : 'Edit Data Penduduk Desa' }}
                    </div>
                    <div class="card-body">
                        <form action="{{ $isNew ? route('admin.datadesa.store') : route('admin.datadesa.update', $singleDatadesa->id) }}" method="POST">
                            @csrf
                            @if (!$isNew)
                                @method('PUT')
                            @endif

                            <div class="mb-3">
                                <input type="text" class="form-control" name="penduduk_laki_laki"
                                    placeholder="Penduduk Laki-Laki"
                                    value="{{ old('penduduk_laki_laki', $singleDatadesa->penduduk_laki_laki ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="penduduk_perempuan"
                                    placeholder="Penduduk Perempuan"
                                    value="{{ old('penduduk_perempuan', $singleDatadesa->penduduk_perempuan ?? '') }}">
                            </div>
                            <button type="submit" class="btn btn-primary shadow-sm">Simpan Data Desa</button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Daftar Data Desa --}}
            <div class="col-md-6 col-12">
                <div class="card shadow mb-3">
                    <div class="card-header bg-success text-white fw-bold">Daftar Data Desa</div>
                    <div class="card-body table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Laki-Laki</th>
                                    <th>Perempuan</th>
                                    <th>Jumlah</th>
                                    <th>Update</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datadesa as $data)
                                    <tr>
                                        <td>{{ $data->penduduk_laki_laki }}</td>
                                        <td>{{ $data->penduduk_perempuan }}</td>
                                        <td>{{ $data->penduduk_laki_laki + $data->penduduk_perempuan }}</td>
                                        <td>{{ $data->updated_at ? $data->updated_at->format('d F Y') : '-' }}</td>
                                        <td>
                                            <form action="{{ route('admin.datadesa.destroy', $data->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div> {{-- End .row --}}
    </div> {{-- End .container --}}

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Chart.js Script -->
</body>
</html>
