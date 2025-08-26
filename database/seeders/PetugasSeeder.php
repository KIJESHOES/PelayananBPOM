<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Petugas;


class PetugasSeeder extends Seeder
{
    public function run(): void
    {
        $Petugas = [
            'Yuniartika Berliani',
            'Eva Nikastri',
            'Krisna Ayu',
            'Defika Taqilala',
            'Hefni Humaeda',
            'Luluatul Khodijah',
            'Suci Tresnasari',
            'Taufik Saputra',
            'Shanty Sarah',
            'Defita Roza',
            'Ester Junita',
            'Suci Tresnaeni',
            'Laila Khoiriyah',
            'Vidia P',
            'Lainnya',
        ];

        foreach ($Petugas as $nama) {
            Petugas::Create(['nama_petugas' => $nama]);
        }
    }
}
