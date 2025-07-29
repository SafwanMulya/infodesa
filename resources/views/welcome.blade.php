<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Desa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .bg-3 {
            background: #fff9c9;
        }
        .card-title {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>
<body>
    @include('layout.header')

    <!-- Section Header -->
    <section class="text-white" style="background: url('{{ asset($hilder->gambar ?? 'default.jpg') }}') center center / cover no-repeat; min-height: 70vh;">
        <div class="position-relative" style="min-height: 70vh;">
            <div style="position: absolute; inset: 0; background-color: rgba(0,0,0,0.5); backdrop-filter: blur(5px); z-index: 1;"></div>
            <div class="container py-5 position-relative" style="z-index: 2;">
                <div class="d-flex justify-content-center align-items-center" style="min-height: 70vh;">
                    <div class="w-100 text-center text-white">
                        <h1 class="mb-3">{{ $hilder->judul ?? 'Judul Belum Ada' }}</h1>
                        <p class="fs-5 mb-3">{{ $hilder->isi ?? 'Isi belum tersedia' }}</p>
                        <p class="fs-5">{{ $hilder->alamat ?? 'Alamat belum diisi' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Data Desa -->
    <section class="bg-light py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-5"><i class="bi bi-database-fill me-2"></i> Data Desa</h2>
            <div class="row g-4 justify-content-center">

                <!-- Data Agama -->
                <div class="col-md-4">
                    <div class="card shadow h-100" id="agama">
                        <div class="card-header bg-success text-white fw-bold text-center">Data Agama</div>
                        <div class="card-body">
                            @foreach($agamas as $agama)
                                <table class="table table-bordered mb-4">
                                    <tbody>
                                        <tr><th>Islam</th><td>{{ $agama->islam }}</td></tr>
                                        <tr><th>Kristen</th><td>{{ $agama->kristen }}</td></tr>
                                        <tr><th>Katolik</th><td>{{ $agama->katolik }}</td></tr>
                                        <tr><th>Hindu</th><td>{{ $agama->hindu }}</td></tr>
                                        <tr><th>Budha</th><td>{{ $agama->budha }}</td></tr>
                                        <tr><th>Konghucu</th><td>{{ $agama->konghucu }}</td></tr>
                                        <tr class="table-success"><th>Jumlah</th>
                                            <td>{{ $agama->islam + $agama->kristen + $agama->katolik + $agama->hindu + $agama->budha + $agama->konghucu }}</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <!-- Chart Agama -->
                                <canvas id="agamaChart" width="100" height="100"></canvas>
                                <script>
                                    const ctxAgama = document.getElementById('agamaChart').getContext('2d');
                                    new Chart(ctxAgama, {
                                        type: 'bar',
                                        data: {
                                            labels: ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu'],
                                            datasets: [{
                                                label: 'Jumlah Pemeluk',
                                                data: [
                                                    {{ $agama->islam }},
                                                    {{ $agama->kristen }},
                                                    {{ $agama->katolik }},
                                                    {{ $agama->hindu }},
                                                    {{ $agama->budha }},
                                                    {{ $agama->konghucu }}
                                                ],
                                                backgroundColor: [
                                                    '#4CAF50', '#2196F3', '#FFC107',
                                                    '#FF5722', '#9C27B0', '#795548'
                                                ],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            responsive: true,
                                            scales: {
                                                y: { beginAtZero: true }
                                            },
                                            plugins: {
                                                legend: { display: false },
                                                tooltip: {
                                                    callbacks: {
                                                        label: (ctx) => `${ctx.parsed.y} orang`
                                                    }
                                                }
                                            }
                                        }
                                    });
                                </script>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Data Penduduk -->
                <div class="col-md-4">
                    <div class="card shadow h-100" id="penduduk">
                        <div class="card-header bg-success text-white fw-bold text-center">Data Penduduk</div>
                        <div class="card-body">
                            @foreach($datadesa as $data)
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr><th>Laki-laki</th><td>{{ $data->penduduk_laki_laki }}</td></tr>
                                        <tr><th>Perempuan</th><td>{{ $data->penduduk_perempuan }}</td></tr>
                                        <tr class="table-info">
                                            <th>Jumlah</th>
                                            <td>{{ $data->penduduk_laki_laki + $data->penduduk_perempuan }}</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <!-- Chart Penduduk -->
                                <canvas id="pendudukChart" width="100" height="100"></canvas>
                                <script>
                                    const ctxPenduduk = document.getElementById('pendudukChart').getContext('2d');
                                    new Chart(ctxPenduduk, {
                                        type: 'doughnut',
                                        data: {
                                            labels: ['Laki-laki', 'Perempuan'],
                                            datasets: [{
                                                data: [{{ $data->penduduk_laki_laki }}, {{ $data->penduduk_perempuan }}],
                                                backgroundColor: ['#36A2EB', '#FF6384'],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            responsive: true,
                                            plugins: {
                                                legend: { position: 'bottom' }
                                            }
                                        }
                                    });
                                </script>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Profil Desa -->
                <div class="col-md-4" id="profildesa">
                    <div class="card shadow h-100">
                        <div class="card-header bg-success text-white fw-bold text-center">Profil Desa</div>
                        <div class="card-body">
                            @if($profilDesa)
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr><th>Nama Desa</th><td>{{ $profilDesa->nama_desa }}</td></tr>
                                        <tr><th>Alamat</th><td>{{ $profilDesa->alamat_desa }}</td></tr>
                                        <tr><th>Kode Pos</th><td>{{ $profilDesa->kode_pos }}</td></tr>
                                        <tr><th>Wilayah</th><td>{{ $profilDesa->luas_wilayah }} km²</td></tr>
                                        <tr><th>Email</th><td>{{ $profilDesa->email }}</td></tr>
                                        <tr><th>Kecamatan</th><td>{{ $profilDesa->kecamatan }}</td></tr>
                                        <tr><th>Kabupaten</th><td>{{ $profilDesa->kabupaten }}</td></tr>
                                        <tr><th>Provinsi</th><td>{{ $profilDesa->provinsi }}</td></tr>
                                    </tbody>
                                </table>
                            @else
                                <p class="text-muted">Data profil desa belum tersedia.</p>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Section Informasi -->
    <section class="py-5" id="informasi">
        <div class="container mt-5">
            <h4 class="fw-bold mb-4 text-center fw-bold">
                <i class="bi bi-card-text me-2"></i> INFORMASI PUBLIK DESA
            </h4>
            <div class="row g-4">
                @forelse($informasi->take(6) as $info)
                    <div class="col-md-6 col-lg-4 d-flex">
                        <div class="card shadow border-0 bg-3 h-100 w-100 d-flex flex-column">
                            <div class="card-body flex-grow-1 d-flex flex-column">
                                <h5 class="card-title text-truncate fw-bold" title="{{ $info->judul }}">{{ $info->judul }}</h5>
                                <p class="card-text text-muted mb-3">
                                    <i class="bi bi-calendar-event me-1"></i>
                                    {{ \Carbon\Carbon::parse($info->tanggal)->format('d-m-Y') }}
                                </p>
                                <div class="mt-auto">
                                    <a href="{{ route('informasi.show', $info->id) }}" class="text-decoration-none d-block text-end fw-semibold text-primary">Selengkapnya &raquo;</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning text-center">Belum ada informasi yang tersedia.</div>
                    </div>
                @endforelse
            </div>

            <!-- Tombol lihat semua -->
            <div class="text-center mt-4">
                <a href="" class="btn btn-outline-primary fw-semibold">
                    Lihat Semua Informasi »
                </a>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
