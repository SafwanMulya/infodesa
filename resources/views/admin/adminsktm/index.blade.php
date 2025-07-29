<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin SKTM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .modal-img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body class="bg-light">

    @include('admin.layout.header')

    <div class="container my-4">
        <h2 class="mb-4">Data Surat Keterangan Tidak Mampu (SKTM)</h2>

        <div class="card">
            <div class="card-header bg-success text-white fw-bold">Daftar Data SKTM</div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped align-middle text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>NIK</th>
                            <th>Tempat Tanggal Lahir</th>
                            <th>Kewarganegaraan</th>
                            <th>Agama</th>
                            <th>Pekerjaan</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Nama Ayah</th>
                            <th>NIK Ayah</th>
                            <th>TTL Ayah</th>
                            <th>Warga Negara Ayah</th>
                            <th>Agama Ayah</th>
                            <th>Pekerjaan Ayah</th>
                            <th>Alamat Ayah</th>
                            <th>Nama Ibu</th>
                            <th>NIK Ibu</th>
                            <th>TTL Ibu</th>
                            <th>Warga Negara Ibu</th>
                            <th>Agama Ibu</th>
                            <th>Pekerjaan Ibu</th>
                            <th>Alamat Ibu</th>
                            <th>Foto KTP</th>
                            <th>Foto KK</th>
                            <th>Tanggal Terupload</th>
                            <th>Cetak</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama_lengkap }}</td>
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->tempat_tanggal_lahir }}</td>
                            <td>{{ $item->kewarganegaraan }}</td>
                            <td>{{ $item->agama }}</td>
                            <td>{{ $item->pekerjaan }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->no_hp }}</td>
                            <td>{{ $item->nama_ayah }}</td>
                            <td>{{ $item->nik_ayah }}</td>
                            <td>{{ $item->ttl_ayah }}</td>
                            <td>{{ $item->kewarganegaraan_ayah }}</td>
                            <td>{{ $item->agama_ayah }}</td>
                            <td>{{ $item->pekerjaan_ayah }}</td>
                            <td>{{ $item->alamat_ayah }}</td>
                            <td>{{ $item->nama_ibu }}</td>
                            <td>{{ $item->nik_ibu }}</td>
                            <td>{{ $item->ttl_ibu }}</td>
                            <td>{{ $item->kewarganegaraan_ibu }}</td>
                            <td>{{ $item->agama_ibu }}</td>
                            <td>{{ $item->pekerjaan_ibu }}</td>
                            <td>{{ $item->alamat_ibu }}</td>
                            <td>
                                @if ($item->foto_ktp)
                                    <img
                                        src="{{ asset('storage/' . $item->foto_ktp) }}"
                                        width="80"
                                        alt="KTP"
                                        class="img-thumbnail zoomable-image"
                                        style="cursor: zoom-in;"
                                        data-full="{{ asset('storage/' . $item->foto_ktp) }}"
                                    >
                                @else
                                    <span class="text-muted">Tidak ada</span>
                                @endif
                            </td>
                            <td>
                                @if ($item->foto_kk)
                                    <img
                                        src="{{ asset('storage/' . $item->foto_kk) }}"
                                        width="80"
                                        alt="KK"
                                        class="img-thumbnail zoomable-image"
                                        style="cursor: zoom-in;"
                                        data-full="{{ asset('storage/' . $item->foto_kk) }}"
                                    >
                                @else
                                    <span class="text-muted">Tidak ada</span>
                                @endif
                            </td>
                            <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
                            <td>
                                <a href="{{ route('adminsktm.cetak', $item->id) }}" class="btn btn-sm btn-danger" target="_blank">
                                    <i class="bi bi-file-earmark-pdf"></i> Cetak
                                </a>
                            </td>
                            <td>
    <form action="{{ route('adminsktm.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger">
            <i class="bi bi-trash"></i> Hapus
        </button>
    </form>
</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal untuk Zoom dan Download Gambar -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Pratinjau Gambar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
          </div>
          <div class="modal-body text-center">
            <img id="modalImage" class="modal-img" src="" alt="Preview">
          </div>
          <div class="modal-footer">
            <a id="downloadLink" href="#" download class="btn btn-success">
              <i class="bi bi-download"></i> Download
            </a>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = new bootstrap.Modal(document.getElementById('imageModal'));
            const modalImage = document.getElementById('modalImage');
            const downloadLink = document.getElementById('downloadLink');

            document.querySelectorAll('.zoomable-image').forEach(img => {
                img.addEventListener('click', () => {
                    const imgSrc = img.getAttribute('data-full');
                    modalImage.src = imgSrc;
                    downloadLink.href = imgSrc;
                    modal.show();
                });
            });
        });
    </script>
</body>
</html>
