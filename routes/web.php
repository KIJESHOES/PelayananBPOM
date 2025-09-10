<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Models\Petugas;
use App\Http\Controllers\KonsultasiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Form konsultasi
Route::get('/', [KonsultasiController::class, 'create'])->name('home');

// Resource hanya create & store
Route::resource('konsultasi', KonsultasiController::class)
    ->only(['create', 'store']);

// Success page setelah submit
Route::get('/konsultasi/success', function () {
    return view('success');
})->name('konsultasi.success');

// Download tanda tangan petugas
Route::get('/signatures/{petugas}/download', function (Petugas $petugas) {
    if (!$petugas->tanda_tangan_upload) {
        abort(404, 'Tanda tangan tidak ditemukan.');
    }

    $path = $petugas->tanda_tangan_upload;

    return response()->download(
        Storage::disk('public')->path($path),
        basename($path)
    );
})->name('signatures.download');