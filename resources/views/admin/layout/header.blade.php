<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Untitle' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg bg-success shadow sticky-top">
  <div class="container">
    <a class="navbar-brand text-white fw-bold" href="#">AdminWeb</a>
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
          <li class="nav-item">
          <a class="nav-link text-white fw-bold" href="{{ route('admin.layanan.index') }}">Layanan</a>
        </li>
          <li class="nav-item">
          <a class="nav-link text-white fw-bold" href="{{ route('admin.permohonan.index') }}">Permohonan Layanan</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        @if(Auth::check())
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
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-light btn-sm fw-bold">Login Admin</a>
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav>

