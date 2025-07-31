<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form SKTM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media (max-width: 767.98px) {
            .card-header {
                font-size: 1rem;
                text-align: center;
            }
        }
    </style>
</head>
<body class="bg-light">

@include('layout.header')
<div class="container mt-4">
    {{-- Notifikasi --}}
    @if (session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#198754'
            });
        </script>
    @endif


<div class="container my-5">
    {{-- Notifikasi --}}
    @if (session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#198754'
            });
        </script>
    @endif
    <h2 class="mb-4 text-center">Formulir Surat Keterangan Tidak Mampu (SKTM)</h2>

    {{-- Tampilkan tombol cetak jika status disetujui --}}
    @if(isset($sktm) && $sktm->status === 'disetujui')
        <div class="mb-3 text-end">
            <a href="{{ route('suratsktm.cetak', $sktm->id) }}" class="btn btn-primary shadow">Cetak PDF</a>
        </div>
    @elseif(isset($sktm))
        <div class="alert alert-warning text-center">Menunggu konfirmasi admin untuk bisa mencetak.</div>
    @endif

    <form action="{{ route('suratsktm.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row gy-4">
            <!-- Card Pemohon -->
            <div class="col-12 col-md-4">
                <div class="card shadow">
                    <div class="card-header bg-success text-white fw-bold">Data Pemohon</div>
                    <div class="card-body">
                        <x-form.input label="Nama Lengkap" name="nama_lengkap" />
                        <x-form.input label="NIK" name="nik" />
                        <x-form.input label="Tempat, Tanggal Lahir" name="tempat_tanggal_lahir" />
                        <x-form.input label="Kewarganegaraan" name="kewarganegaraan" value="Indonesia" />
                        <x-form.input label="Agama" name="agama" />
                        <x-form.input label="Pekerjaan" name="pekerjaan" />
                        <x-form.textarea label="Alamat" name="alamat" />
                        <x-form.input label="Nomor HP" name="no_hp" />
                        <x-form.input type="file" label="Foto KTP" name="foto_ktp" accept="image/*" />
                        <x-form.input type="file" label="Foto KK" name="foto_kk" accept="image/*" />
                    </div>
                </div>
            </div>

            <!-- Card Ayah -->
            <div class="col-12 col-md-4">
                <div class="card shadow">
                    <div class="card-header bg-success text-white fw-bold">Data Ayah Pemohon</div>
                    <div class="card-body">
                        <x-form.input label="Nama Ayah" name="nama_ayah" />
                        <x-form.input label="NIK Ayah" name="nik_ayah" />
                        <x-form.input label="TTL Ayah" name="ttl_ayah" />
                        <x-form.input label="Kewarganegaraan Ayah" name="kewarganegaraan_ayah" value="Indonesia" />
                        <x-form.input label="Agama Ayah" name="agama_ayah" />
                        <x-form.input label="Pekerjaan Ayah" name="pekerjaan_ayah" />
                        <x-form.textarea label="Alamat Ayah" name="alamat_ayah" />
                    </div>
                </div>
            </div>

            <!-- Card Ibu -->
            <div class="col-12 col-md-4">
                <div class="card shadow">
                    <div class="card-header bg-success text-white fw-bold">Data Ibu Pemohon</div>
                    <div class="card-body">
                        <x-form.input label="Nama Ibu" name="nama_ibu" />
                        <x-form.input label="NIK Ibu" name="nik_ibu" />
                        <x-form.input label="TTL Ibu" name="ttl_ibu" />
                        <x-form.input label="Kewarganegaraan Ibu" name="kewarganegaraan_ibu" value="Indonesia" />
                        <x-form.input label="Agama Ibu" name="agama_ibu" />
                        <x-form.input label="Pekerjaan Ibu" name="pekerjaan_ibu" />
                        <x-form.textarea label="Alamat Ibu" name="alamat_ibu" />
                    </div>
                </div>

                <div class="mt-4 d-grid">
                    <button type="submit" class="btn btn-success shadow">Kirim</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
