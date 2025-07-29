<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $informasi->judul }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    @include('layout.header')

    <div class="container py-5 shadow bg-white mt-5">
        <div class="container">
            <h2 class="mb-3">{{ $informasi->judul }}</h2>
            <p class="text-muted">
                <i class="bi bi-calendar-event me-1"></i>
                {{ \Carbon\Carbon::parse($informasi->tanggal)->format('d-m-Y') }} / Desa Tameran
            </p>
            <hr>
            <div>
                <p>{{ $informasi->konten }}</p>
            </div>
            <a href="{{ url('/') }}" class="btn btn-secondary mt-4">&laquo; Kembali ke Beranda</a>
        </div>

        <!-- Filter Form -->
        <h5 class="mt-5 fw-bold">Cari Informasi</h5>
        <form method="GET" action="{{ route('informasi.show', $informasi->id) }}" class="row g-3 mb-4">
            <div class="col-md-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" value="{{ request('tanggal') }}" class="form-control  shadow-sm">
            </div>
            <div class="col-md-3">
                <label for="bulan" class="form-label">Bulan</label>
                <select name="bulan" id="bulan" class="form-select shadow-sm">
                    <option value="">-- Pilih Bulan --</option>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}" {{ request('bulan') == $i ? 'selected' : '' }}>
                            {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                        </option>
                    @endfor
                </select>
            </div>
            <div class="col-md-3">
                <label for="tahun" class="form-label">Tahun</label>
                <select name="tahun" id="tahun" class="form-select shadow-sm">
                    <option value="">-- Pilih Tahun --</option>
                    @foreach(range(date('Y'), 2020) as $year)
                        <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>
                            {{ $year }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button type="submit" class="btn btn-success w-100 shadow-sm">Cari Informasi</button>
            </div>
        </form>

        <!-- Tabel Semua Informasi -->
        <h5 class="mt-4">Daftar Semua Informasi</h5>
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
                    @forelse($semuaInformasi as $info)
                        <tr>
                            <td>{{ $info->judul }}</td>
                            <td>{{ \Carbon\Carbon::parse($info->tanggal)->format('d-m-Y') }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($info->konten, 100) }}</td>
                            <td>
                                <a href="{{ route('informasi.show', $info->id) }}" class="btn btn-warning btn-sm">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
