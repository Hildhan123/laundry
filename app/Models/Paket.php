<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_paket',
        'deskripsi_paket',
        'harga_per_kiloan',
        'id_toko',
        'opsi_antar',
    ];

    protected $primaryKey = 'id_paket';
}
