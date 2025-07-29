
    @extends('admin.layout.app',['title'=>'Detail Permohonan'])
    @section('content')
    <div class="container mt-4">
        <h2 class="fw-bold mb-4"><i class="bi bi-table"></i> Detail Permohonan
     
        </h2>

        {{-- Notifikasi --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="row">
            {{-- Tabel --}}
            <div class="col-12 col-md-12 mb-4">
                <h3>{{ $permohonan->layanan->nama }}</h3>
                <form action="{{ route('admin.permohonan.cetak',$permohonan->id) }}" method="POST">
                    @csrf
                       <button class="btn btn-sm btn-primary">Cetak Surat</button>
                </form>
            </div>
            </div>
            </div>
@endsection