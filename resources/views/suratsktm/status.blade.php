<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Status SKTM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4 text-center">Status Pengajuan SKTM</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow">
        <div class="card-body text-center">
            <h4>Halo, {{ $sktm->nama_lengkap }}</h4>
            <p>Status pengajuan:
                <span class="badge {{ $sktm->status === 'disetujui' ? 'bg-success' : 'bg-warning' }}">
                    {{ ucfirst($sktm->status) }}
                </span>
            </p>

            @if($sktm->status === 'disetujui')
                <a href="{{ route('suratsktm.cetak', $sktm->id) }}" class="btn btn-primary">Cetak PDF</a>
            @else
                <p class="text-muted">Mohon tunggu, pengajuan Anda sedang diproses oleh admin.</p>
            @endif
        </div>
    </div>

    @auth
        @if(Auth::user()->is_admin)
        <form action="{{ route('suratsktm.konfirmasi', $sktm->id) }}" method="POST" class="text-center mt-4">
            @csrf
            <button type="submit" class="btn btn-success">Konfirmasi & Setujui</button>
        </form>
        @endif
    @endauth
</div>

</body>
</html>
