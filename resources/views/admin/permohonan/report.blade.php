<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Permohonan</title>
</head>
<body style="font-family: Arial, sans-serif; font-size: 12px; margin: 20px;">

    <h2 style="text-align: center; margin-bottom: 10px;">Laporan Data Permohonan</h2>
    <p style="text-align: center; margin-bottom: 30px;">Desa Tameran</p>

    <table width="100%" border="1" cellspacing="0" cellpadding="5" style="border-collapse: collapse; font-size: 11px;">
        <thead style="background-color: #f2f2f2;">
            <tr>
                <th style="text-align: center;">No</th>
                <th style="text-align: center;">Kode Tiket</th>
                <th style="text-align: center;">Tanggal Permohonan</th>
                <th style="text-align: center;">NIK Pemohon</th>
                <th style="text-align: center;">Alamat</th>
                <th style="text-align: center;">Jenis Permohonan</th>
                <th style="text-align: center;">Status</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($data as $row)
            <tr>
                <td style="text-align: center;">{{ $no++ }}</td>
                <td>{{ $row->kode_tiket }}</td>
                <td style="text-align: center;">{{ \Carbon\Carbon::parse($row->created_at)->format('d/m/Y') }}</td>
                <td style="text-align: center;">{{ $row->nik }}</td>
                <td>{{ $row->alamat_pemohon }}</td>
                <td>{{ $row->layanan->nama }}</td>
                <td style="text-align: center;">
                    @if($row->tte_pada)
                        <span style="color: green; font-weight: bold;">Selesai</span>
                    @else
                        <span style="color: red; font-weight: bold;">Belum Diproses</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p style="margin-top: 30px; text-align: right;">Dicetak pada: {{ \Carbon\Carbon::now()->format('d M Y') }}</p>

</body>
</html>
