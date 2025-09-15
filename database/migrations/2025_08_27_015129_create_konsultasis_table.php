<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('konsultasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('no_hp')->nullable();
            $table->string('instansi')->nullable();
            $table->string('tandatangan')->nullable();
            $table->text('alamat')->nullable();

            // relasi ke tabel master
            $table->foreignId('loket_id')->constrained()->onDelete('cascade');
            $table->foreignId('komoditas_id')->constrained()->onDelete('cascade');
            $table->foreignId('jenis_layanan_id')->constrained()->onDelete('cascade');
            $table->foreignId('petugas_id')->nullable()->constrained()->onDelete('set null');

            // kalau user pilih "Lainnya" di petugas
            $table->string('nama_petugas_manual')->nullable();

            // detail konsultasi
            $table->timestamp('tanggal_konsultasi')->nullable();
            $table->string('perihal')->nullable();
            $table->text('catatan_konsultasi')->nullable();
            $table->enum('status', ['pending', 'terkirim', 'gagal'])->default('pending');

            // tindak lanjut oleh admin
            $table->text('tindak_lanjut')->nullable();
            $table->string('signature')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konsultasis');
    }
};
