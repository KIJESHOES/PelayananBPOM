<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisLayananSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('jenis_layanans')->insert([
            ['nama_layanan' => 'Informasi Obat dan Makanan dan Pengaduan Masyarakat'],
            ['nama_layanan' => 'Sertifikasi CDOB'],
            ['nama_layanan' => 'Persetujuan Denah PBF'],
            ['nama_layanan' => 'Sertifikasi CPOTB secara Bertahap'],
            ['nama_layanan' => 'Sertifikasi SPA CPKB'],
            ['nama_layanan' => 'Penerbitan Rekomendasi sebagai Pemohon Notifikasi Kosmetik'],
            ['nama_layanan' => 'Penerbitan Izin Penerapan CPPOB'],
        ]);
    }
}