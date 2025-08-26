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
            "Kantor Utama Balai POM Bogor",
            "MPP Kabupaten Bogor"
        ];

        foreach ($jenislayanans as $nama) {
            JenisLayanan::create(['nama_layanan' => $nama]);
        }
    }
}
