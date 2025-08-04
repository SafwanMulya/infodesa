@extends('layout.app', ['title' => 'Daftar Informasi'])
@section('content')
<div class="container shadow bg-white mt-5 p-4 rounded">
    <h3 class="text-center text-success fw-bold mb-4">
        <i class="bi bi-megaphone-fill me-2"></i> Daftar Semua Informasi
    </h3>

    <!-- Form Pencarian -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <form action="{{ url('informasi') }}" method="GET" class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label for="tanggal" class="form-label fw-bold">Cari Berdasarkan Tanggal</label>
                    <input type="date" id="tanggal" name="tanggal" value="{{ request('tanggal') }}" class="form-control shadow-sm">
                </div>
                <div class="col-md-3">
                    <label for="bulan" class="form-label fw-bold">Bulan</label>
                    <select id="bulan" name="bulan" class="form-select shadow-sm">
                        <option value="">-- Semua Bulan --</option>
                        @foreach(range(1, 12) as $m)
                            <option value="{{ $m }}" {{ request('bulan') == $m ? 'selected' : '' }}>
                                {{ \Carbon\Carbon::create()->month($m)->translatedFormat('F') }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="tahun" class="form-label fw-bold">Tahun</label>
                    <select id="tahun" name="tahun" class="form-select shadow-sm">
                        <option value="">-- Semua Tahun --</option>
                        @foreach(range(date('Y'), date('Y') - 10) as $y)
                            <option value="{{ $y }}" {{ request('tahun') == $y ? 'selected' : '' }}>{{ $y }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 d-grid">
                    <button type="submit" class="btn btn-success shadow-sm">
                        <i class="bi bi-search me-1"></i> Cari
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel Informasi -->
    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle shadow-sm">
            <thead class="table-success text-center">
                <tr>
                    <th width="25%">Judul</th>
                    <th width="15%">Tanggal</th>
                    <th width="40%">Konten</th>
                    <th width="10%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($informasi as $info)
                    <tr class="align-middle">
                        <td class="fw-bold">{{ $info->judul }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($info->tanggal)->format('d-m-Y') }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($info->konten, 100) }}</td>
                        <td class="text-center">
                            <a href="{{ url('informasi/'.$info->id)}}" class="btn btn-warning btn-sm shadow-sm">
                                <i class="bi bi-eye"></i> Lihat
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-3">
                            <i class="bi bi-info-circle me-1"></i> Tidak ada data informasi ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- JavaScript Efek Animasi -->
<script>
    // Efek Fade-in untuk baris tabel
    document.addEventListener("DOMContentLoaded", function () {
        const rows = document.querySelectorAll("tbody tr");
        rows.forEach((row, index) => {
            row.style.opacity = "0";
            row.style.transform = "translateY(10px)";
            setTimeout(() => {
                row.style.transition = "all 0.4s ease";
                row.style.opacity = "1";
                row.style.transform = "translateY(0)";
            }, index * 150);
        });
    });
</script>
@endsection
