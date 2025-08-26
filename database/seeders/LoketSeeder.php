<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Loket;

class LoketSeeder extends Seeder
{
    public function run(): void
    {
        $lokets = [
            "Kantor Utama Balai POM Bogor",
            "MPP Kabupaten Bogor"
        ];

        foreach ($lokets as $nama) {
            Loket::create(['nama_loket' => $nama]);
        }
    }
}
