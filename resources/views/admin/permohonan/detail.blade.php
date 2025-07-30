@extends('admin.layout.app', ['title' => 'Detail Permohonan'])
@section('content')
    <div class="container mt-4">
        <h2 class="fw-bold mb-4"><i class="bi bi-table"></i> Detail Permohonan

        </h2>

        {{-- Notifikasi --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="row">
            {{-- Tabel --}}
            <div class="col-12 col-md-12 mb-4">
                <!-- Modal -->
                <div class="modal fade" id="modalCetakSurat" tabindex="-1" aria-labelledby="modalCetakSuratLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="{{ route('admin.permohonan.cetak', $permohonan->id) }}" method="POST">
                            <!-- Ganti sesuai endpoint -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalCetakSuratLabel">Generate Surat</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- CSRF Token jika pakai Laravel -->
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="mb-3">
                                        <label for="nomorSurat" class="form-label">Nomor Surat</label>
                                        <input type="text" class="form-control" id="nomorSurat" name="nomor_surat"
                                            required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="penandatangan" class="form-label">Pejabat Penandatangan</label>
                                        <input type="text" class="form-control" id="penandatangan" name="nama_pejabat"
                                            required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="tanggalCetak" class="form-label">Tanggal Cetak</label>
                                        <input type="date" class="form-control" id="tanggalCetak" name="tanggal_cetak"
                                            required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal fade" id="modalLihatSurat" tabindex="-1" aria-labelledby="modalCetakSuratLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form action="{{ route('admin.permohonan.ttd', $permohonan->id) }}" method="POST">
                            <!-- Ganti sesuai endpoint -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalCetakSuratLabel">Lihat Surat</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- CSRF Token jika pakai Laravel -->
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    @if (!$permohonan->tte_pada)
                                        <iframe src="{{ asset($permohonan->surat_pdf) }}" type="application/pdf"
                                            width="100%" height="600px"></iframe>
                                        <div class="form-group row">
                                            <div class="col-4">
                                                <input type="text" class="form-control form-control-sm col-6"
                                                    name="nik_pejabat" placeholder="Masukkan NIK Pejabat Penandatangan"
                                                    required>
                                            </div>
                                            <div class="col-4">
                                                <input type="password" class="form-control form-control-sm col-6"
                                                    name="passphrase" placeholder="Masukkan Passpharase" required>
                                            </div>
                                            <div class="col-4">
                                                <button onclick="return confirm('Anda sudah yakin data pada surat sudah benar ?')" type="submit" class="btn btn-primary">Lakukan TTE Sekarang</button>
                                            </div>
                                        </div>
                                    @else
                                        <iframe src="{{ asset($permohonan->surat_tte) }}" type="application/pdf"
                                            width="100%" height="600px"></iframe>
                                        <div class="alert alert-success">Surat sudah ditandatangani Elektronik pada
                                            {{ $permohonan->tte_pada }} <br><br>
                                            <button name="ulangi_tte" value="true" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Anda yakin ?')">Batalkan TTE</button>
                                        </div>
                                    @endif


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    @if ($permohonan->tte_pada)
                                        <a href="/{{ $permohonan->surat_tte }}" class="btn btn-primary btn-md">Download
                                            Surat</a>
                                    @endif

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <h3>{{ $permohonan->layanan->nama }}
                    <div class="float-end btn-group">
                        @if ($permohonan->tanggal_cetak)
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                data-bs-target="#modalLihatSurat"> <i class="bi bi-eye"></i> Lihat Surat</button>
                        @endif
                        @if (!$permohonan->tte_pada)
                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#modalCetakSurat"> <i class="bi bi-printer"></i> Generate Surat</button>
                        @endif
                    </div>
                </h3>
                <div class="form-group">
                    <small for="">Nama Pemohon</small>
                    <p>{{ $permohonan->nama_pemohon }}</p>
                </div>
                <div class="form-group">
                    <small for="">NIK</small>
                    <p>{{ $permohonan->nik_pemohon }}</p>
                </div>
                <div class="form-group">
                    <small for="">Alamat</small>
                    <p>{{ $permohonan->alamat_pemohon }}</p>
                </div>
                <div class="form-group">
                    <small for="">No Hp</small>
                    <p>{{ $permohonan->nohp }}</p>
                </div>
                @if ($form = config('form-layanan.' . $permohonan->layanan->kode_layanan))
                    @foreach (collect(json_decode(json_encode($form))) as $item)
                        <div class="form-group">
                            @if ($item->type == 'break')
                                <hr>
                                <b>{{ str($item->kolom)->headline() }}</b>
                                <hr>
                            @elseif($item->type == 'file')
                                <small>{{ str($item->kolom)->headline() }}</small>
                                <p><a href="{{ $permohonan->data_permohonan[$item->kolom] ?? null }}"
                                        class="btn btn-sm btn-primary">Lihat</a></p>
                            @else
                                <small>{{ str($item->kolom)->headline() }}</small>
                                <p>{{ $permohonan->data_permohonan[$item->kolom] ?? null }}</p>
                            @endif
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div>
@endsection
