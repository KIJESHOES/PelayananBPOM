<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetugasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('petugas')->insert([
            ['nama_petugas' => 'Yuniartika Berliani'],
            ['nama_petugas' => 'Eva Nikastri'],
            ['nama_petugas' => 'Krisna Ayu'],
            ['nama_petugas' => 'Defika Taqilala'],
            ['nama_petugas' => 'Hefni Humaeda'],
            ['nama_petugas' => 'Luluatul Khodijah'],
            ['nama_petugas' => 'Suci Tresnasari'],
            ['nama_petugas' => 'Taufik Saputra'],
            ['nama_petugas' => 'Shanty Sarah'],
            ['nama_petugas' => 'Defita Roza'],
            ['nama_petugas' => 'Ester Junita'],
            ['nama_petugas' => 'Suci Tresnaeni'],
            ['nama_petugas' => 'Laila Khoiriyah'],
            ['nama_petugas' => 'Vidia P'],
            ['nama_petugas' => 'Lainnya'], // untuk opsi manual
        ]);
    }
}