@extends('layout.app', ['title' => 'Pengajuan '.$layanan->nama])
@section('content')
@if(session('success') )
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Berhasil!</strong> {{ session('success') }}
</div>
@endif
    <div class="container shadow bg-white mt-5 p-4">

        <h3>Pengajuan {{ $layanan->nama }}</h3>

        <!-- Filter Form -->
    <form action="{{ URL::current() }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <small for="">Nama Pemohon</small>
            <input type="text" class="form-control form-control-sm" placeholder="Masukkan Nama Pemohon" name="nama_pemohon">
        </div>
          <div class="form-group">
            <small for="">NIK</small>
            <input type="text" placeholder="Masukkan NIK"  class="form-control form-control-sm" name="nik_pemohon">
        </div>
          <div class="form-group">
            <small for="">Alamat</small>
            <input type="text" placeholder="Masukkan Alamat"  class="form-control form-control-sm" name="alamat_pemohon">
        </div>
          <div class="form-group">
            <small for="">No Hp</small>
            <input type="text" class="form-control form-control-sm" name="nohp" placeholder="Masukkan No Hp" >
        </div>
        @if($form = config('form-layanan.'.$layanan->kode_layanan))
        @foreach (collect(json_decode(json_encode($form))) as $item)
    
            <div class="form-group">
                    @if($item->type=='break')
                    <hr>
            <b>{{ str($item->kolom)->headline() }}</b>
                    <hr>

         @elseif($item->type=='file')
            <small>{{ str($item->kolom)->headline() }}</small>
            <input type="file" name="{{ $item->kolom }}" class="form-control form-control-sm">
            @else 
                  <small>{{ str($item->kolom)->headline() }}</small>
            <input type="{{ $item->type }}" name="{{ $item->kolom }}" class="form-control form-control-sm" placeholder="Masukkan {{ str($item->kolom)->headline() }}">
            @endif
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