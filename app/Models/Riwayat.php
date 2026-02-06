<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_paket',
        'nama_pembeli',
        'total_bayar',
        'id_paket',
        'id_pembeli',
        'status',
    ];
    protected $primaryKey = 'id_order';
}
