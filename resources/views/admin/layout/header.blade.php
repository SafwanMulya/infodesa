<nav class="navbar navbar-expand-lg bg-success shadow sticky-top">
  <div class="container">
    <a class="navbar-brand text-white fw-bold" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active text-white fw-bold" aria-current="page" href="{{ url('/admin/profil') }}">Profil Desa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white fw-bold" href="{{ url('/admin/informasi') }}">Informasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white fw-bold" href="{{ url('/admin/datadesa') }}">Data Desa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white fw-bold" href="{{ url('/admin/hilder') }}">Hilder</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Layanan Surat
          </a>
          <ul class="dropdown-menu bg-success shadow">
            <li><a class="dropdown-item text-white fw-bold" href="{{ route('admin.adminsktm.index') }}">Surat Keterangan Tidak Mampu</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
