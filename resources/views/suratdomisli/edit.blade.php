@extends('layout.header')

@section('content')
<div class="container">
    <h1>Edit Pengajuan Surat Keterangan Domisili</h1>
    <form action="{{ route('suratdomisili.update', $suratDomisili->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap', $suratDomisili->nama_lengkap) }}" required>
            @error('nama_lengkap')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik', $suratDomisili->nik) }}" required>
            @error('nik')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tempat_tanggal_lahir" class="form-label">Tempat, Tanggal Lahir</label>
            <input type="text" class="form-control @error('tempat_tanggal_lahir') is-invalid @enderror" id="tempat_tanggal_lahir" name="tempat_tanggal_lahir" value="{{ old('tempat_tanggal_lahir', $suratDomisili->tempat_tanggal_lahir) }}" required>
            @error('tempat_tanggal_lahir')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki" {{ old('jenis_kelamin', $suratDomisili->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin', $suratDomisili->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
            @error('jenis_kelamin')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
            <input type="text" class="form-control @error('kewarganegaraan') is-invalid @enderror" id="kewarganegaraan" name="kewarganegaraan" value="{{ old('kewarganegaraan', $suratDomisili->kewarganegaraan) }}" required>
            @error('kewarganegaraan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="agama" class="form-label">Agama</label>
            <input type="text" class="form-control @error('agama') is-invalid @enderror" id="agama" name="agama" value="{{ old('agama', $suratDomisili->agama) }}" required>
            @error('agama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="pekerjaan" class="form-label">Pekerjaan</label>
            <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan', $suratDomisili->pekerjaan) }}" required>
            @error('pekerjaan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="alamat_sebelumnya" class="form-label">Alamat Sebelumnya (Opsional)</label>
            <textarea class="form-control @error('alamat_sebelumnya') is-invalid @enderror" id="alamat_sebelumnya" name="alamat_sebelumnya" rows="3">{{ old('alamat_sebelumnya', $suratDomisili->alamat_sebelumnya) }}</textarea>
            @error('alamat_sebelumnya')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="alamat_sekarang" class="form-label">Alamat Sekarang</label>
            <textarea class="form-control @error('alamat_sekarang') is-invalid @enderror" id="alamat_sekarang" name="alamat_sekarang" rows="3" required>{{ old('alamat_sekarang', $suratDomisili->alamat_sekarang) }}</textarea>
            @error('alamat_sekarang')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">Nomor HP</label>
            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp', $suratDomisili->no_hp) }}" required>
            @error('no_hp')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email (Opsional)</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $suratDomisili->email) }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="foto_ktp" class="form-label">Foto KTP (JPG, JPEG, PNG, Max 2MB)</label>
            @if ($suratDomisili->foto_ktp)
                <p>Foto saat ini: <img src="{{ asset('storage/' . $suratDomisili->foto_ktp) }}" alt="Foto KTP" width="100"></p>
            @endif
            <input type="file" class="form-control @error('foto_ktp') is-invalid @enderror" id="foto_ktp" name="foto_ktp">
            @error('foto_ktp')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="foto_kk" class="form-label">Foto Kartu Keluarga (JPG, JPEG, PNG, Max 2MB)</label>
            @if ($suratDomisili->foto_kk)
                <p>Foto saat ini: <img src="{{ asset('storage/' . $suratDomisili->foto_kk) }}" alt="Foto KK" width="100"></p>
            @endif
            <input type="file" class="form-control @error('foto_kk') is-invalid @enderror" id="foto_kk" name="foto_kk">
            @error('foto_kk')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Perbarui Surat</button>
    </form>
</div>
@endsection
