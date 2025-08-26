<?php

namespace App\Models\JenisUsaha;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komoditas extends Model
{
    use HasFactory;
    protected $table = 'komoditas';
    protected $fillable = [
        'nama_komoditas',
    ];
}
