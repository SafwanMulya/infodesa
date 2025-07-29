@extends('layout.app', ['title' => $layanan->nama ?? 'Detail Informasi'])
@section('content')
    <div class="container  shadow bg-white mt-5">
            <h2 class="mb-3 py-3">{{ $layanan->nama }}</h2>
            
            <hr>
            <div class="p-4">
                <p>{{ $layanan->keterangan }}</p>
            </div>
        

        <!-- Filter Form -->

 

        <!-- Tabel Semua Informasi -->
   
    </div>

@endsection