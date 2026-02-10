<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pembeli',
        'no_hp_pembeli',
        'alamat_pembeli',
        'id_user',
        'foto',
    ];

    protected $primaryKey = 'id_pembeli';
}
