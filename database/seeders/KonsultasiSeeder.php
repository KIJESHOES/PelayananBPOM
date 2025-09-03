<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class KonsultasiSeeder extends Seeder
{
    public function run(): void
    {
        // Contoh: pastikan tabel master sudah ada data, misal ID 1
        $loketId = 1;
        $komoditasId = 1;
        $jenisLayananId = 1;
        $petugasId = 1; // bisa null kalau mau

        DB::table('konsultasis')->insert([
            [
                'nama' => 'Fikri Saputra',
                'email' => 'saputramuhamad2911@gmail.com',
                'no_hp' => '08123456789',
                'instansi' => 'Universitas ABC',
                'alamat' => 'Jl. Contoh No. 1',

                'loket_id' => $loketId,
                'komoditas_id' => $komoditasId,
                'jenis_layanan_id' => $jenisLayananId,
                'petugas_id' => $petugasId,
                'nama_petugas_manual' => null,

                'tanggal_konsultasi' => Carbon::now(),
                'perihal' => 'Konsultasi Sistem Informasi',
                'catatan_konsultasi' => 'Diskusi tentang integrasi API dan database.',

                'tindak_lanjut' => 'Follow-up via email, kirim dokumen referensi.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Dewi Lestari',
                'email' => 'saputramuhamad2911@gmail.com',
                'no_hp' => '08987654321',
                'instansi' => 'PT. Contoh',
                'alamat' => 'Jl. Contoh No. 2',

                'loket_id' => $loketId,
                'komoditas_id' => $komoditasId,
                'jenis_layanan_id' => $jenisLayananId,
                'petugas_id' => null,
                'nama_petugas_manual' => 'Budi Santoso',

                'tanggal_konsultasi' => Carbon::now(),
                'perihal' => 'Konsultasi Produk Baru',
                'catatan_konsultasi' => 'Menanyakan regulasi dan syarat pemasaran.',

                'tindak_lanjut' => 'Dikirimkan panduan regulasi.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // tambah data dummy lain sesuai kebutuhan
        ]);
    }
}
