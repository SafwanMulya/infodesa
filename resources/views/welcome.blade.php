@extends('layout.app',['title' => 'Website Desa Tameran'])
@section('content')

<!-- AOS CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

<!-- Section Header -->
<section class="text-white shadow" style="background: url('{{ asset($hilder->gambar ?? 'default.jpg') }}') center center / cover no-repeat; min-height: 70vh;">
    <div class="position-relative" style="min-height: 70vh;">
        <div style="position: absolute; inset: 0; background: rgba(0,0,0,0.55); backdrop-filter: blur(4px); z-index: 1;"></div>
        <div class="container py-5 position-relative text-center text-white" style="z-index: 2;">
            <div class="d-flex flex-column justify-content-center align-items-center" style="min-height: 70vh;">
                <h1 class="fw-bold display-4" data-aos="fade-down">
                    {{ $hilder->judul ?? 'Judul Belum Ada' }}
                </h1>
                <p class="fs-5 mt-3" data-aos="fade-up">
                    {{ $hilder->isi ?? 'Isi belum tersedia' }}
                </p>
                <p class="fs-6" data-aos="fade-up" data-aos-delay="200">
                    <i class="bi bi-geo-alt-fill me-2"></i>{{ $hilder->alamat ?? 'Alamat belum diisi' }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Section Data Desa -->
<section class="bg-light py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-5 text-success" data-aos="fade-up">
            <i class="bi bi-database-fill me-2"></i> Data Desa
        </h2>
        <div class="row g-4 justify-content-center">

            <!-- Data Agama -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card shadow-lg border-0 rounded-4 h-100" id="agama">
                    <div class="card-header bg-success text-white fw-bold text-center rounded-top-4">
                        <i class="bi bi-person-lines-fill me-2"></i> Data Agama
                    </div>
                    <div class="card-body">
                        @foreach($agamas as $agama)
                            <table class="table table-hover table-bordered mb-4">
                                <tbody>
                                    <tr><th>Islam</th><td>{{ $agama->islam }}</td></tr>
                                    <tr><th>Kristen</th><td>{{ $agama->kristen }}</td></tr>
                                    <tr><th>Katolik</th><td>{{ $agama->katolik }}</td></tr>
                                    <tr><th>Hindu</th><td>{{ $agama->hindu }}</td></tr>
                                    <tr><th>Budha</th><td>{{ $agama->budha }}</td></tr>
                                    <tr><th>Konghucu</th><td>{{ $agama->konghucu }}</td></tr>
                                    <tr class="table-success">
                                        <th>Total</th>
                                        <td class="fw-bold">
                                            {{ $agama->islam + $agama->kristen + $agama->katolik + $agama->hindu + $agama->budha + $agama->konghucu }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <canvas id="agamaChart" height="150"></canvas>
                            <script>
                                new Chart(document.getElementById('agamaChart').getContext('2d'), {
                                    type: 'bar',
                                    data: {
                                        labels: ['Islam','Kristen','Katolik','Hindu','Budha','Konghucu'],
                                        datasets: [{
                                            label: 'Jumlah Pemeluk',
                                            data: [{{ $agama->islam }},{{ $agama->kristen }},{{ $agama->katolik }},{{ $agama->hindu }},{{ $agama->budha }},{{ $agama->konghucu }}],
                                            backgroundColor: ['#4CAF50','#2196F3','#FFC107','#FF5722','#9C27B0','#795548']
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        plugins: { legend: { display: false } }
                                    }
                                });
                            </script>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Data Penduduk -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card shadow-lg border-0 rounded-4 h-100" id="penduduk">
                    <div class="card-header bg-success text-white fw-bold text-center rounded-top-4">
                        <i class="bi bi-people-fill me-2"></i> Data Penduduk
                    </div>
                    <div class="card-body">
                        @foreach($datadesa as $data)
                            <table class="table table-hover table-bordered">
                                <tbody>
                                    <tr><th>Laki-laki</th><td>{{ $data->penduduk_laki_laki }}</td></tr>
                                    <tr><th>Perempuan</th><td>{{ $data->penduduk_perempuan }}</td></tr>
                                    <tr class="table-info">
                                        <th>Total</th>
                                        <td class="fw-bold">{{ $data->penduduk_laki_laki + $data->penduduk_perempuan }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <canvas id="pendudukChart" height="150"></canvas>
                            <script>
                                new Chart(document.getElementById('pendudukChart').getContext('2d'), {
                                    type: 'doughnut',
                                    data: {
                                        labels: ['Laki-laki', 'Perempuan'],
                                        datasets: [{
                                            data: [{{ $data->penduduk_laki_laki }}, {{ $data->penduduk_perempuan }}],
                                            backgroundColor: ['#36A2EB','#FF6384']
                                        }]
                                    },
                                    options: { responsive: true, plugins: { legend: { position: 'bottom' } } }
                                });
                            </script>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Profil Desa -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card shadow-lg border-0 rounded-4 h-100" id="profildesa">
                    <div class="card-header bg-success text-white fw-bold text-center rounded-top-4">
                        <i class="bi bi-info-circle-fill me-2"></i> Profil Desa
                    </div>
                    <div class="card-body">
                        @if($profilDesa)
                            <table class="table table-hover table-bordered table-responsive">
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
        <h4 class="fw-bold mb-4 text-center text-success" data-aos="zoom-in">
            <i class="bi bi-card-text me-2"></i> INFORMASI PUBLIK DESA
        </h4>
        <div class="row g-4">
            @forelse($informasi->take(6) as $info)
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="card shadow border-0 h-100 hover-shadow transition">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-truncate fw-bold" title="{{ $info->judul }}">{{ $info->judul }}</h5>
                            <p class="card-text text-muted mb-3">
                                <i class="bi bi-calendar-event me-1"></i> {{ \Carbon\Carbon::parse($info->tanggal)->format('d-m-Y') }}
                            </p>
                            <a href="/informasi" class="mt-auto btn btn-outline-success btn-sm w-100">Selengkapnya &raquo;</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning text-center">Belum ada informasi yang tersedia.</div>
                </div>
            @endforelse
        </div>
        <div class="text-center mt-4" data-aos="fade-up" data-aos-delay="400">
            <a href="" class="btn btn-success fw-semibold px-4">
                Lihat Semua Informasi »
            </a>
        </div>
    </div>
</section>

<!-- AOS JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init({
        duration: 1000, // Durasi animasi
        once: true,     // Animasi hanya jalan sekali
        offset: 120     // Jarak trigger
    });
</script>
@endsection
