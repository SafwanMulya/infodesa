<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Surat Usaha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4">
    <h3 class="fw-bold mb-3">
        <i class="bi bi-briefcase-fill me-2"></i> Data Surat Usaha
        <a href="{{ url('/admin/datadesa') }}" class="btn btn-primary float-end shadow">Kembali</a>
    </h3>
    <!-- Table Output -->
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title mb-3">Daftar Permohonan</h5>
            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>TTL</th>
                        <th>JK</th>
                        <th>Agama</th>
                        <th>Pekerjaan</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Email</th>
                        <th>Usaha</th>
                        <th>Jenis</th>
                        <th>Waktu</th>
                        <th>KTP</th>
                        <th>KK</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_lengkap }}</td>
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->tempat_tanggal_lahir }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->agama }}</td>
                            <td>{{ $item->pekerjaan }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->no_hp }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->nama_usaha }}</td>
                            <td>{{ $item->jenis_usaha }}</td>
                            <td>{{ $item->waktu_usaha }}</td>
                            <td>
                                @if($item->foto_ktp)
                                    <a href="{{ asset('storage/' . $item->foto_ktp) }}" target="_blank">Lihat</a>
                                @else -
                                @endif
                            </td>
                            <td>
                                @if($item->foto_usaha)
                                    <a href="{{ asset('storage/' . $item->foto_usaha) }}" target="_blank">Lihat</a>
                                @else -
                                @endif
                            </td>
                            <td>
                                @if($item->status == 'dalam proses')
                                    <span class="badge bg-warning text-dark">Dalam Proses</span>
                                @elseif($item->status == 'disetujui')
                                    <span class="badge bg-success">Disetujui</span>
                                @else
                                    <span class="badge bg-danger">Ditolak</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="16" class="text-center">Belum ada data masuk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
