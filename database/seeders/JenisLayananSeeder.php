<?php

namespace Database\Seeders;

use App\Models\JenisLayanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisLayananSeeder extends Seeder
{
    public function run(): void
    {
        $jenislayanans = [
            "Informasi Obat dan Makanan dan Pengaduan Masyarakat",
            "Sertifikasi CDOB",
            "Persetujuan Denah PBF",
            "Sertifikasi CPOTB secara Bertahap",
            "Sertifikasi SPA CPKB",
            "⁠Penerbitan Rekomendasi sebagai Pemohon Notifikasi Kosmetik",
            "Penerbitan Izin Penerapan CPPOB"
        ];

        foreach ($jenislayanans as $nama) {
            JenisLayanan::create(['nama_layanan' => $nama]);
        }
    }
}
