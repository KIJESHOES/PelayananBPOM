<?php

use Illuminate\Support\Facades\Route;

// ======================
// User Routes
// ======================
Route::prefix('user')->group(function () {
    Route::get('/form', function () {
        return view('user.form'); // -> resources/views/user/form.blade.php
    })->name('user.form');
});