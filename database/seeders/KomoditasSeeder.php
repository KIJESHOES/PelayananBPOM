<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KomoditasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('komoditas')->insert([
            ['nama_komoditas' => 'Pangan Olahan'],
            ['nama_komoditas' => 'Obat Bahan Alam'],
            ['nama_komoditas' => 'Obat'],
            ['nama_komoditas' => 'Suplemen Kesehatan'],
            ['nama_komoditas' => 'Kosmetik'],
            ['nama_komoditas' => 'Umum'],
        ]);
    }
}