<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_admin',
        'no_hp_admin',
        'foto',
        'id_user',
    ];

    //protected $primaryKey = 'id_user';
}
