<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Loket extends Model
{
    use HasFactory;
    Protected $table = 'loket';
    Protected $fillable = [
        'nama_loket',
    ];
}
