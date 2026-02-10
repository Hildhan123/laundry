<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjual extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_penjual',
        'no_hp_penjual',
        'alamat_penjual',
        'foto',
        'id_user',
    ];

    protected $primaryKey = 'id_penjual';
}
