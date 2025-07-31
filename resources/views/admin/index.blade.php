
    @extends('admin.layout.app',['title'=>'Dashboard'])
    @section('content')
      <style>
    .card-icon {
      font-size: 2rem;
      color: white;
      padding: 20px;
      border-radius: 50%;
    }
    .bg-layanan { background-color: #0d6efd; }
    .bg-informasi { background-color: #198754; }
    .bg-permohonan { background-color: #ffc107; }
  </style>
    <style>
    .welcome-section {
      background: linear-gradient(135deg, #00c6ff, #0072ff);
      color: white;
      border-radius: 1rem;
      padding: 3rem 2rem;
      text-align: center;
      box-shadow: 0 4px 20px rgba(0,0,0,0.2);
      margin-bottom: 2rem;
    }
    .welcome-section h1 {
      font-weight: 700;
      font-size: 2.5rem;
    }
    .welcome-section p {
      font-size: 1.2rem;
    }
    .highlight {
      color: #ffe600;
      font-weight: bold;
    }
  </style>
    <div class="container mt-4">
        <h2 class="fw-bold mb-4"><i class="bi bi-speedometer2"></i> Dashboard</h2>

        {{-- Notifikasi --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
 <div class="welcome-section">
    <h1>👋 Selamat Datang, <span class="highlight">Admin</span>!</h1>
    <p>Anda sedang mengelola <strong>Website Resmi Desa Tameran</strong></p>
    <p class="mb-0">Semoga harimu menyenangkan dan produktif 🎉</p>
  </div>
  <h4>Statistik Data!</h4>
  <br>
  <div class="row g-4">
    <!-- Layanan -->
    <div class="col-md-4">
      <div class="card shadow-sm border-0" style="cursor:pointer" onclick="location.href='{{ route('admin.layanan.index') }}'">
        <div class="card-body d-flex align-items-center">
          <div class="card-icon bg-layanan me-3">
            <i class="bi bi-gear-fill"></i>
          </div>
          <div>
            <h5 class="card-title mb-1">Layanan</h5>
            <h3 class="mb-0">{{ $jumlahLayanan ?? 0 }}</h3>
          </div>
        </div>
      </div>
    </div>
    <!-- Informasi -->
    <div class="col-md-4">
      <div class="card shadow-sm border-0" style="cursor:pointer" onclick="location.href='{{ route('admin.informasi.index') }}'">
        <div class="card-body d-flex align-items-center">
          <div class="card-icon bg-informasi me-3">
            <i class="bi bi-info-circle-fill"></i>
          </div>
          <div>
            <h5 class="card-title mb-1">Informasi</h5>
            <h3 class="mb-0">{{ $jumlahInformasi ?? 0 }}</h3>
          </div>
        </div>
      </div>
    </div>
    <!-- Permohonan -->
    <div class="col-md-4">
      <div class="card shadow-sm border-0" style="cursor:pointer" onclick="location.href='{{ route('admin.permohonan.index') }}'">
        <div class="card-body d-flex align-items-center">
          <div class="card-icon bg-permohonan me-3">
            <i class="bi bi-envelope-fill"></i>
          </div>
          <div>
            <h5 class="card-title mb-1">Permohonan</h5>
            <h3 class="mb-0">{{ $jumlahPermohonan ?? 0 }}</h3>
          </div>
        </div>
      </div>
    </div>
  </div>

        </div>
        @endsection