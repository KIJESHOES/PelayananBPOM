<?php

namespace Database\Seeders;

use App\Models\JenisUsaha\Komoditas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KomoditasSeeder extends Seeder
{
        public function run(): void
    {
        $komoditas = [
            "Kantor Utama Balai POM Bogor",
            "MPP Kabupaten Bogor"
        ];

        foreach ($komoditas as $nama) {
            Komoditas::create(['nama_komoditas' => $nama]);
        }
    }
}
