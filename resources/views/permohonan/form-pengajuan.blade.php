@extends('layout.app', ['title' => 'Pengajuan '.$layanan->nama])
@section('content')
    <div class="container shadow bg-white mt-5 p-4">

        <h3>Pengajuan {{ $layanan->nama }}</h3>

        <!-- Filter Form -->
    <form action="{{ URL::current() }}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Nama Pemohon</label>
            <input type="text" class="form-control" name="nama_pemohon">
        </div>
          <div class="form-group">
            <label for="">NIK</label>
            <input type="text" class="form-control" name="nik">
        </div>
          <div class="form-group">
            <label for="">Alamat</label>
            <input type="text" class="form-control" name="alamat">
        </div>
          <div class="form-group">
            <label for="">No Hp</label>
            <input type="text" class="form-control" name="nohp">
        </div>
        @if($form = config('form-layanan.'.$layanan->kode_layanan))
        @foreach (json_decode(json_encode($form)) as $item)
            <div class="form-group">
            <label>{{ str($item->kolom)->headline() }}</label>
            <input type="text" name="{{ $item->kolom }}" class="form-control">
            </div>
        @endforeach
        @endif
        <div class="form-group mt-4">
            <button class="btn btn-sm btn-primary" onclick="return confirm('apakah semua data sudah benar ?')">Kirim Permohonan</button>
        </div>
    </form>
 

        <!-- Tabel Semua Informasi -->
   
    </div>

@endsection