<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Agama</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-light">
    <div class="container mt-5">

        <h3 class="fw-bold mb-3">
            <i class="bi bi-house-door-fill me-2"></i> Data Agama  <a href="{{ url('/admin/datadesa') }}" class="btn btn-primary shadow">Kembali</a>
        </h3>

        <div class="row">
            <!-- Form -->
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header text-white bg-success fw-bold">
                        {{ $isNew ? 'Tambah Agama' : 'Edit Data Agama' }}
                    </div>
                    <div class="card-body">
                        <form action="{{ $isNew ? route('admin.agama.store') : route('admin.agama.update', $singleAgama->id) }}" method="POST">
                            @csrf
                            @if (!$isNew)
                                @method('PUT')
                            @endif

                            <div class="mb-3">
                                <input type="text" class="form-control" name="islam" placeholder="Jumlah Islam" value="{{ old('islam', $singleAgama->islam ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="kristen" placeholder="Jumlah Kristen" value="{{ old('kristen', $singleAgama->kristen ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="katolik" placeholder="Jumlah Katolik" value="{{ old('katolik', $singleAgama->katolik ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="hindu" placeholder="Jumlah Hindu" value="{{ old('hindu', $singleAgama->hindu ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="budha" placeholder="Jumlah Budha" value="{{ old('budha', $singleAgama->budha ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="konghucu" placeholder="Jumlah Konghucu" value="{{ old('konghucu', $singleAgama->konghucu ?? '') }}">
                            </div>
                            <button type="submit" class="btn btn-primary shadow-sm">Simpan Agama</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow mb-3">
                    <div class="card-header bg-success text-white fw-bold">Grafik Data Agama</div>
                        <div class="card-body col-md-12">
                           <h5 class="fw-bold">Statistik Visual</h5>
                           <canvas id="agamaChart" width="400" height="200"></canvas>
                       </div>
                </div>
            </div>

            <!-- Tabel dan Grafik -->
            <div class="col-md-8">
                <div class="card shadow mb-3">
                    <div class="card-header bg-success text-white fw-bold">
                        Daftar Agama
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Islam</th>
                                    <th>Kristen</th>
                                    <th>Katolik</th>
                                    <th>Hindu</th>
                                    <th>Budha</th>
                                    <th>Konghucu</th>
                                    <th>Jumlah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($agamas as $agama)
                                    <tr>
                                        <td>{{ $agama->islam }}</td>
                                        <td>{{ $agama->kristen }}</td>
                                        <td>{{ $agama->katolik }}</td>
                                        <td>{{ $agama->hindu }}</td>
                                        <td>{{ $agama->budha }}</td>
                                        <td>{{ $agama->konghucu }}</td>
                                        <td>{{ $agama->islam + $agama->kristen + $agama->katolik + $agama->hindu + $agama->budha + $agama->konghucu }}</td>
                                        <td>
                                            <form action="{{ route('admin.agama.destroy', $agama->id) }}" method="POST" class="d-inline">
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
            <!-- Grafik -->

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Chart.js Script -->
    <script>
        const ctx = document.getElementById('agamaChart').getContext('2d');
        const agamaChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu'],
                datasets: [{
                    label: 'Jumlah Pemeluk',
                    data: [
                        {{ $statistik['islam'] ?? 0 }},
                        {{ $statistik['kristen'] ?? 0 }},
                        {{ $statistik['katolik'] ?? 0 }},
                        {{ $statistik['hindu'] ?? 0 }},
                        {{ $statistik['budha'] ?? 0 }},
                        {{ $statistik['konghucu'] ?? 0 }}
                    ],
                    backgroundColor: 'rgba(128, 0, 128, 0.6)',
                    borderColor: 'rgba(128, 0, 128, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
ss
