<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Konsultasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'instansi',
        'alamat',
        'loket_id',
        'komoditas_id',
        'jenis_layanan_id',
        'petugas_id',
        'tanggal_konsultasi',
        'perihal',
        'catatan',
        'catatan_tindak_lanjut',
    ];

    protected static function booted()
    {
        static::saving(function ($model) {
            if ($model->isDirty('tanggal_konsultasi') && $model->tanggal_konsultasi) {
                // set jam sesuai waktu saat data disimpan
                $model->tanggal_konsultasi = Carbon::parse($model->tanggal_konsultasi)
                    ->setTime(now()->hour, now()->minute, now()->second);
            }
        });
    }

    public function loket()
    {
        return $this->belongsTo(Loket::class);
    }

    public function komoditas()
    {
        return $this->belongsTo(Komoditas::class);
    }

    public function jenisLayanan()
    {
        return $this->belongsTo(JenisLayanan::class);
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }
}