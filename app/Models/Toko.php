<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_toko',
        'deskripsi_toko',
        'alamat_toko',
        'no_hp_toko',
        'id_user',
        'id_penjual',
        'sosmed',
    ];

    protected $primaryKey = 'id_toko';
}
