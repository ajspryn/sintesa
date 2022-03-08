<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function jabatan(){
        return $this->belongsTo(Jabatan::class);
    }

    public function divisi(){
        return $this->belongsTo(Divisi::class);
    }

    public function golongan(){
        return $this->belongsTo(Golongan::class);
    }

    public function pendidikan(){
        return $this->belongsTo(Pendidikan::class);
    }

    public function status_karyawan(){
        return $this->belongsTo(Status_karyawan::class);
    }

    public function gaji_pokok(){
        return $this->belongsTo(Gaji_pokok::class);
    }

    public function gaji(){
        return $this->belongsTo(Gaji::class);
    }

    public function bank(){
        return $this->hasMany(Bank::class);
    }

    public function bpjs(){
        return $this->hasMany(Bpjs::class);
    }

    public function bpjs_karyawan(){
        return $this->hasMany(Bpjs_karyawan::class);
    }

    public function lampiran(){
        return $this->hasMany(Lampiran::class);
    }

    public function absensi()
    {
        return $this->belongsToMany(Absensi::class);
    }
}
