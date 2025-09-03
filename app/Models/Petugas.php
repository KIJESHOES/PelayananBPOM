<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_petugas',
        'tanda_tangan_upload',
    ];

    // Accessor untuk tanda tangan aktif
    protected $appends = ['tanda_tangan_aktif'];

    public function getTandaTanganAktifAttribute()
    {
        return $this->tanda_tangan_upload;
    }

    public function konsultasis()
    {
        return $this->hasMany(Konsultasi::class);
    }
}