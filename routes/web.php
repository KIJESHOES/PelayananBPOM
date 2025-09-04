<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Models\Petugas;
use App\Http\Controllers\KonsultasiController;

// resource route untuk konsultasi
Route::resource('konsultasi', KonsultasiController::class);

// alias "/" langsung ke form create konsultasi
Route::get('/', [KonsultasiController::class, 'create'])->name('home');

// download tanda tangan
Route::get('/signatures/{petugas}/download', function (Petugas $petugas) {
    if (!$petugas->tanda_tangan_upload) {
        abort(404, 'Tanda tangan tidak ditemukan.');
    }

    $path = $petugas->tanda_tangan_upload;

    return response()->download(Storage::disk('public')->path($path), basename($path));
})->name('signatures.download');