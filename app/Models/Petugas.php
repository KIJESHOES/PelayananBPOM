<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_petugas',
    ];

    public function konsultasis()
    {
        return $this->hasMany(Konsultasi::class);
    }
}