@extends('layout.app', ['title' => $informasi->judul ?? 'Detail Informasi'])
@section('content')
    <div class="container  shadow bg-white mt-5">
            <h2 class="mb-3 py-3">{{ $informasi->judul }}</h2>
            <p class="text-muted">
                <i class="bi bi-calendar-event me-1"></i>
                {{ \Carbon\Carbon::parse($informasi->tanggal)->format('d-m-Y') }} / Desa Tameran
            </p>
            <hr>
            <div class="p-4">
                <p>{{ $informasi->konten }}</p>
            </div>
        

        <!-- Filter Form -->

 

        <!-- Tabel Semua Informasi -->
   
    </div>

@endsection