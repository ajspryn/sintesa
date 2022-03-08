<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji_pokok extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function karyawan(){
        return $this->hasMany(Karyawan::class);
    }

    public function golongan(){
        return $this->hasMany(Golongan::class);
    }
}
