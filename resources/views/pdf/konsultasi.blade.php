<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Konsultasi</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        .kop {
            text-align: center;
            border-bottom: 2px solid black;
            margin-bottom: 20px;
        }

        .content {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        td {
            padding: 6px;
            vertical-align: top;
        }
    </style>
</head>

<body>
    <div class="kop">
        <h2>KOP SURAT PERUSAHAAN / INSTANSI</h2>
        <p>Alamat lengkap | Telp | Email</p>
    </div>

    <div class="content">
        <h3>Data Konsultasi</h3>
        <table>
            <tr>
                <td>Nama</td>
                <td>: {{ $konsultasi->nama }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>: {{ $konsultasi->email }}</td>
            </tr>
            <tr>
                <td>No HP</td>
                <td>: {{ $konsultasi->no_hp }}</td>
            </tr>
            <tr>
                <td>Instansi</td>
                <td>: {{ $konsultasi->instansi }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: {{ $konsultasi->alamat }}</td>
            </tr>
            <tr>
                <td>Loket</td>
                <td>: {{ $konsultasi->loket->nama_loket }}</td>
            </tr>
            <tr>
                <td>Komoditas</td>
                <td>: {{ $konsultasi->komoditas->nama_komoditas }}</td>
            </tr>
            <tr>
                <td>Jenis Layanan</td>
                <td>: {{ $konsultasi->jenisLayanan->nama_layanan }}</td>
            </tr>
            <tr>
                <td>Petugas</td>
                <td>:
                    {{ $konsultasi->nama_petugas_manual ?? ($konsultasi->petugas?->nama_petugas ?? '-') }}
                </td>
            </tr>

            <tr>
                <td>Tanggal</td>
                <td>: {{ \Carbon\Carbon::parse($konsultasi->tanggal_konsultasi)->translatedFormat('l, d-m-Y') }}</td>
            </tr>

            <tr>
                <td>Perihal</td>
                <td>: {{ $konsultasi->perihal }}</td>
            </tr>
            <tr>
                <td>Catatan Konsultasi</td>
                <td>: {{ $konsultasi->catatan_konsultasi }}</td>
            </tr>
            <tr>
                <td>Tindak Lanjut</td>
                <td>: {{ $konsultasi->tindak_lanjut }}</td>
            </tr>
        </table>
    </div>
</body>

</html>
