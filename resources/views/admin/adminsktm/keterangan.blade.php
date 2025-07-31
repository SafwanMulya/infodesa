<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            margin: 40px;
            color: #000;
        }
        .header {
            text-align: center;
            margin-bottom: 10px;
        }
        .header h2, .header h3 {
            margin: 0;
            line-height: 1.4;
        }
        .line {
            border-top: 3px solid #000;
            margin-top: 5px;
            margin-bottom: 20px;
        }
        .judul {
            text-align: center;
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 5px;
        }
        .nomor {
            text-align: center;
            margin-bottom: 20px;
        }
        .content {
            font-size: 16px;
            line-height: 1.8;
        }
        .indent {
            text-indent: 50px;
            text-align: justify;
        }
        table {
            margin-left: 50px;
            margin-bottom: 10px;
        }
        td {
            vertical-align: top;
            padding: 2px 5px;
        }
        .ttd {
            width: 300px;
            float: right;
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <!-- HEADER -->
    <div class="header">
        <h2>PEMERINTAH KABUPATEN BENGKALIS</h2>
        <h3>KECAMATAN BENGKALIS</h3>
        <h3>DESA TAMERAN</h3>
        <p>Jl. Utama Desa Tameran Telp: ............. Kode Pos: 28751</p>
    </div>
    <div class="line"></div>

    <!-- JUDUL -->
    <div class="judul">SURAT KETERANGAN</div>
    <div class="nomor">Nomor: 470/PEM/SK/V/2025/14</div>

    <!-- ISI SURAT -->
    <div class="content">
        <p class="indent">
            Kepala Desa Tameran Kecamatan Bengkalis Kabupaten Bengkalis dengan ini menerangkan bahwa:
        </p>
        <table>
            <tr>
                <td style="width: 180px;">Nama Lengkap</td>
                <td>: <b>{{ $data->nama_lengkap }}</b></td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>: {{ $data->nik }}</td>
            </tr>
            <tr>
                <td>Tempat/Tanggal Lahir</td>
                <td>: {{ $data->tempat_tanggal_lahir }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>: {{ $data->jenis_kelamin }}</td>
            </tr>
            <tr>
                <td>Kewarganegaraan</td>
                <td>: {{ $data->kewarganegaraan }}</td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>: {{ $data->agama }}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>: {{ $data->pekerjaan }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: {{ $data->alamat }}</td>
            </tr>
        </table>

        <p class="indent">
            Dengan ini kami jelaskan bahwa benar nama tersebut sesuai dengan Kartu Keluarga dan KTP.
        </p>
        <p class="indent">
            Adapun surat keterangan ini dibuat untuk keperluan <b>{{ $data->keperluan }}</b>
            dan dapat dipergunakan sebagaimana mestinya.
        </p>
    </div>

    <!-- TANDA TANGAN -->
    <div class="ttd">
        <p>Tameran, {{ $tanggal_surat }}</p>
        <p>KEPALA DESA TAMERAN</p>
        <p>KECAMATAN BENGKALIS</p>
        <br><br><br>
        <p><b><u>{{ $kepala_desa }}</u></b><br></p>
    </div>
</body>
</html>
