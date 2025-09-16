<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8" />
        <title>Formulir Konsultasi</title>
        <style>
            @page {
                size: A4;
                margin: 20mm;
            }

            body {
                font-family: Calibri, Arial, sans-serif;
                font-size: 11pt;
                line-height: 1.5;
                color: #000;
            }

            .font-9 {
                font-size: 8pt;
            }

            .font-12 {
                font-size: 12pt;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            td {
                padding: 6px;
                vertical-align: top;
            }

            .label {
                width: 30%;
                padding-right: 4px;
            }

            .colon {
                width: 8px;
                text-align: center;
            }

            .no-border td {
                border: none;
            }

            .sign-table td {
                border: none;
                text-align: center;
                padding-top: 20mm;
            }
        </style>
    </head>

    <body>
        <!-- Header dengan logo -->
        <table class="no-border" style="margin-bottom: 10px">
            <tr>
                <td style="width: 80px; text-align: left">
                    <img
                        src="{{public_path('assets/img/favicon.png') }}"
                        alt="Logo BPOM"
                        style="height: 70px"
                    />
                </td>
                <td style="text-align: center">
                    <div class="font-12" style="font-weight: bold">
                        BALAI PENGAWAS OBAT DAN MAKANAN DI KABUPATEN BOGOR
                    </div>
                    <div class="font-12" style="font-weight: bold">
                        BIDANG INFORMASI DAN KOMUNIKASI
                    </div>
                </td>
            </tr>
        </table>

        <!-- Judul -->
        <div
            class="font-12"
            style="text-align: center; font-weight: bold; margin-bottom: 10px"
        >
            FORMULIR KONSULTASI (Langsung / Email / Telepon / Media Sosial)
        </div>

        <!-- Tabel Data 3 kolom -->
        <table>
            <tr>
                <td class="label">Hari/Tanggal</td>
                <td class="colon">:</td>
                <td>
                    {{
                    \Carbon\Carbon::parse($konsultasi->tanggal_konsultasi)
                        ->locale('id') // aktifkan locale indonesia
                        ->translatedFormat('l, d-m-Y');}}
                </td>
            </tr>
            <tr>
                <td class="label">Nama Petugas Konsultasi</td>
                <td class="colon">:</td>
                <td>
                    {{ $konsultasi->nama_petugas_manual ??
                    ($konsultasi->petugas?->nama_petugas ?? '-') }}
                </td>
            </tr>
            <tr>
                <td class="label">Nama</td>
                <td class="colon">:</td>
                <td>{{ $konsultasi->nama }}</td>
            </tr>
            <tr>
                <td class="label">Nomor Telepon/HP</td>
                <td class="colon">:</td>
                <td>{{ $konsultasi->no_hp }}</td>
            </tr>
            <tr>
                <td class="label">Instansi/Perusahaan</td>
                <td class="colon">:</td>
                <td>{{ $konsultasi->instansi }}</td>
            </tr>
            <tr>
                <td class="label">Alamat</td>
                <td class="colon">:</td>
                <td>{{ $konsultasi->alamat }}</td>
            </tr>
            <tr>
                <td class="label">Perihal</td>
                <td class="colon">:</td>
                <td>{{ $konsultasi->perihal }}</td>
            </tr>
             <tr>
                <td class="label">Jenis Usaha/Komoditas</td>
                <td class="colon">:</td>
                <td>{{ $konsultasi->komoditas->nama_komoditas }}</td>
            </tr>
            <tr>
                <td class="label">Jenis Layanan</td>
                <td class="colon">:</td>
                <td>{{ $konsultasi->jenisLayanan->nama_layanan }}</td>
            </tr>
            <tr>
                <td class="label">Catatan Konsultasi</td>
                <td class="colon">:</td>
                <td>{{ $konsultasi->catatan_konsultasi }}</td>
            </tr>
            <tr>
                <td class="label">Tindak Lanjut</td>
                <td class="colon">:</td>
                <td>{{ $konsultasi->tindak_lanjut }}</td>
            </tr>
        </table>

        <!-- Tanda Tangan -->
        <table class="sign-table" style="width: 100%">
            <tr>
                <td style="text-align: center; vertical-align: top;">
                    Perusahaan/Instansi<br /><br /><br />

                    @if($konsultasi->signature)
                        <div style="text-align: center;">
                            <img src="{{ storage_path('app/public/' . $konsultasi->signature) }}"
                                style="width: 150px; height: auto; display: block; margin: 0 auto; margin-bottom: 5px;">
                            <div><strong>{{ $konsultasi->nama }}</strong></div>
                        </div>
                    @else
                        <div style="text-align: center;">
                            (...........................................) <br>
                            <strong>{{ $konsultasi->nama }}</strong>
                        </div>
                    @endif
                </td>
                <td>
                    Petugas Konsultasi<br /><br /><br /><br /><br />
                    (...........................................)
                </td>
            </tr>
        </table>
    </body>
</html>
