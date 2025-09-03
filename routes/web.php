<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Models\Petugas;

Route::get('/', function () {
    return view('form');
});

Route::get('/signatures/{petugas}/download', function (Petugas $petugas) {
    if (!$petugas->tanda_tangan_upload) {
        abort(404, 'Tanda tangan tidak ditemukan.');
    }

    $path = $petugas->tanda_tangan_upload;

    return response()->download(Storage::disk('public')->path($path), basename($path));
})->name('signatures.download');