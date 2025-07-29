<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Tidak Mampu</title>
    <style>
        @page { margin: 1.5cm; }
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 12px;
            line-height: 1.4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 94%;
            margin: auto;
        }
        .header {
            text-align: center;
            margin-bottom: 5px;
            position: relative;
        }
        .header img {
            width: 80px;
            position: absolute;
            top: 10px;
            left: 25px;
        }
        .header h2, .header p {
            margin: 2px 0;
        }
        .line {
            border-bottom: 3px double black;
            margin: 10px 0;
        }
        .title {
            text-align: center;
            font-weight: bold;
            text-decoration: underline;
            margin-top: 4px;
            margin-bottom: 4px;
        }
        .subtitle {
            text-align: center;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            margin: 0 auto 8px;
            border-collapse: collapse;
            font-size: 11.5px;
        }
        table tr td:first-child {
            width: 35%;
        }
        td {
            vertical-align: top;
            padding: 2px 4px;
        }
        .section-title {
            font-weight: bold;
            padding-top: 4px;
        }
        p {
            margin: 6px 0;
            text-align: justify;
        }
        .signature {
            width: 100%;
            margin-top: 40px;
        }
        .signature-right {
            float: right;
            text-align: center;
            width: 45%;
        }
        .qrcode {
            margin-top: 5px;
        }
        .qrcode img {
            width: 90px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <img src="{{ public_path('logo.png') }}" alt="Logo Pemerintah">
        <h2>PEMERINTAH KABUPATEN BENGKALIS</h2>
        <h2>KECAMATAN BENGKALIS</h2>
        <h2>DESA TAMERAN</h2>
        <div style="text-align: center; font-size: 12px; margin-top: 2px;">
        Jl. Utama Desa Tameran Telp: (0766) 123456
    </div>
        <div class="line"></div>
    </div>

    <div class="title">SURAT KETERANGAN KURANG MAMPU</div>
    <p class="subtitle">Nomor: 470/PEM/SKTM/VII/2025</p>

    <p>Kepala Desa Tameran Kecamatan Bengkalis, Kabupaten Bengkalis dengan ini menerangkan bahwa yang bersangkutan:</p>

    <table>
        <tr><td>Nama Lengkap</td><td>: {{ $data->nama_lengkap }}</td></tr>
        <tr><td>NIK</td><td>: {{ $data->nik }}</td></tr>
        <tr><td>Tempat, Tanggal Lahir</td><td>: {{ $data->tempat_tanggal_lahir }}</td></tr>
        <tr><td>Kewarganegaraan</td><td>: {{ $data->kewarganegaraan }}</td></tr>
        <tr><td>Agama</td><td>: {{ $data->agama }}</td></tr>
        <tr><td>Pekerjaan</td><td>: {{ $data->pekerjaan }}</td></tr>
        <tr><td>Alamat</td><td>: {{ $data->alamat }}</td></tr>
    </table>

    <p class="section-title">Adalah benar anak dari:</p>

    <table>
        <tr><td><strong>Ayah</strong></td><td></td></tr>
        <tr><td>Nama</td><td>: {{ $data->nama_ayah }}</td></tr>
        <tr><td>NIK</td><td>: {{ $data->nik_ayah }}</td></tr>
        <tr><td>Tempat, Tanggal Lahir</td><td>: {{ $data->ttl_ayah }}</td></tr>
        <tr><td>Kewarganegaraan</td><td>: {{ $data->kewarganegaraan_ayah }}</td></tr>
        <tr><td>Agama</td><td>: {{ $data->agama_ayah }}</td></tr>
        <tr><td>Pekerjaan</td><td>: {{ $data->pekerjaan_ayah }}</td></tr>
        <tr><td>Alamat</td><td>: {{ $data->alamat_ayah }}</td></tr>

        <tr><td><strong>Ibu</strong></td><td></td></tr>
        <tr><td>Nama</td><td>: {{ $data->nama_ibu }}</td></tr>
        <tr><td>NIK</td><td>: {{ $data->nik_ibu }}</td></tr>
        <tr><td>Tempat, Tanggal Lahir</td><td>: {{ $data->ttl_ibu }}</td></tr>
        <tr><td>Kewarganegaraan</td><td>: {{ $data->kewarganegaraan_ibu }}</td></tr>
        <tr><td>Agama</td><td>: {{ $data->agama_ibu }}</td></tr>
        <tr><td>Pekerjaan</td><td>: {{ $data->pekerjaan_ibu }}</td></tr>
        <tr><td>Alamat</td><td>: {{ $data->alamat_ibu }}</td></tr>
    </table>

    <p>
        Benar yang bersangkutan berdomisili di <strong>{{ $data->alamat }}</strong>, Desa Tameran Kecamatan Bengkalis Kabupaten Bengkalis.
        Dengan ini kami jelaskan, sepanjang pengetahuan kami, nama tersebut di atas adalah tergolong keluarga yang <strong>Kurang Mampu</strong> sesuai dengan data yang ada pada kami.
    </p>

    <p>
        Adapun Surat Keterangan Kurang Mampu ini kami buat untuk melengkapi persyaratan <strong>Administrasi Pendidikan</strong> yang bersangkutan.
    </p>

    <p>Demikian surat ini kami buat agar dapat digunakan sebagaimana mestinya.</p>

    <div class="signature">
    <p style="text-align: right; margin-right: 50px;">Tameran, {{ \Carbon\Carbon::parse($data->created_at)->translatedFormat('d F Y') }}</p>
    <p style="text-align: right; margin-right: 50px;">An. KEPALA DESA TAMERAN</p><br><br>
    <p style="text-align: right; margin-right: 50px;">____________________</p>
    <p style="text-align: right; margin-right: 50px;">SAFARUDDIN, A.Md</p>
</div>

</div>
</body>
</html>
