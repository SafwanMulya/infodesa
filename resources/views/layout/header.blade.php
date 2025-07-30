<nav class="navbar navbar-expand-lg bg-success shadow sticky-top">
  <div class="container">
    <a class="navbar-brand text-white fw-bold" href="{{ url('/') }}">DESA TAMERAN</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active text-white fw-bold" aria-current="page" href="#datadesa">Profil Desa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white fw-bold" href="/informasi">Informasi</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Data Desa
          </a>
          <ul class="dropdown-menu bg-success shadow">
            <li><a class="dropdown-item text-white fw-bold" href="#agama">Penganut Agama</a></li>
            <li><a class="dropdown-item text-white fw-bold" href="#penduduk">Penduduk Desa</a></li>
            <li><a class="dropdown-item text-white fw-bold" href="#profildesa">Profil Desa</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white fw-bold" href="/layanan">Layanan</a>
        </li>
      </ul>

      <!-- Login / Logout di Sebelah Kanan -->
      <ul class="navbar-nav ms-auto">
        @if(session()->has('admin_id'))
          <!-- Jika Admin Sudah Login -->
          <li class="nav-item me-2">
            <a href="{{ url('/admin/dashboard') }}" class="btn btn-light btn-sm fw-bold">Dashboard</a>
          </li>
          <li class="nav-item">
            <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
              @csrf
              <button type="submit" class="btn btn-danger btn-sm fw-bold">Logout</button>
            </form>
          </li>
        @else
          <!-- Jika Belum Login -->
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-light btn-sm fw-bold">Login Admin</a>
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
