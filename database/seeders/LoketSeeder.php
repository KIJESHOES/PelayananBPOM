<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoketSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('lokets')->insert([
            ['nama_loket' => 'Kantor Utama Balai POM Bogor'],
            ['nama_loket' => 'MPP Kabupaten Bogor'],
        ]);
    }
}