<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Divisi;
use App\Models\Gaji_pokok;
use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\Karyawan;
use App\Models\Pendidikan;
use App\Models\Status_karyawan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name'=>'Adji Supriyono',
            'email'=>'adjisupriyono@gmail.com',
            'password'=>bcrypt('12345678')
        ]);

        Divisi::create([
            'nama_divisi'=> 'SDM'
        ]);

        Divisi::create([
            'nama_divisi'=> 'Keuangan'
        ]);

        Divisi::create([
            'nama_divisi'=> 'Operasional'
        ]);

        Golongan::create([
            'nama_golongan_id'=> 'A1',
        ]);

        Golongan::create([
            'nama_golongan_id'=> 'B1',
        ]);

        Golongan::create([
            'nama_golongan_id'=> 'C1',
        ]);

        Golongan::create([
            'nama_golongan_id'=> 'D1',
        ]);

        Gaji_pokok::create([
            'nama_golongan_id'=> 'A1',
            'masa_kerja'=> '1',
            'besaran_gaji' => '2000000',
            'gol_id'=>'A11'
        ]);

        Gaji_pokok::create([
            'nama_golongan_id'=> 'B1',
            'masa_kerja'=> '1',
            'besaran_gaji' => '3000000',
            'gol_id'=>'B11'
        ]);

        Gaji_pokok::create([
            'nama_golongan_id'=> 'C1',
            'masa_kerja'=> '1',
            'besaran_gaji' => '4000000',
            'gol_id'=>'B11'
        ]);

        Gaji_pokok::create([
            'nama_golongan_id'=> 'D1',
            'masa_kerja'=> '1',
            'besaran_gaji' => '5000000',
            'gol_id'=>'D11'
        ]);

        Jabatan::create([
            'nama_jabatan'=> 'Staff',
            'tunjangan_jabatan' => '200000'
        ]);

        Jabatan::create([
            'nama_jabatan'=> 'Manager',
            'tunjangan_jabatan' => '400000'
        ]);

        Jabatan::create([
            'nama_jabatan'=> 'Direksi',
            'tunjangan_jabatan' => '600000'
        ]);

        Jabatan::create([
            'nama_jabatan'=> 'Komisaris',
            'tunjangan_jabatan' => '800000'
        ]);

        Karyawan::create([
            'foto'=>'',
            'nik'=> '0001',
            'nip'=> '0001',
            'nama'=> 'Adji Supriyono',
            'alamat'=> 'Bogor',
            'tgl_lahir'=> '2000-04-08',
            'kelamin'=> 'Pria',
            'pendidikan_id'=> '2',
            'status_karyawan_id'=> '1',
            'tgl_masuk_karyawan'=> '2020-12-12',
            'tgl_pengangkatan'=> '2021-01-05',
            'jabatan_id'=> '1',
            'divisi_id'=> '1',
            'golongan_id'=> 'B1',
            'no_hp'=> '085777704131',
            'gol_id'=>'B11'
        ]);

        Pendidikan::create([
            'nama_pendidikan'=>'SMA/SMK Sederajat'
        ]);

        Pendidikan::create([
            'nama_pendidikan'=>'S1'
        ]);

        Pendidikan::create([
            'nama_pendidikan'=>'S2'
        ]);

        Pendidikan::create([
            'nama_pendidikan'=>'S3'
        ]);

        Status_karyawan::create([
            'nama_status'=>'Karyawan Tetap'
        ]);

        Status_karyawan::create([
            'nama_status'=>'Karyawan Kontrak'
        ]);

        Status_karyawan::create([
            'nama_status'=>'Tenaga Kerja Harian'
        ]);

    }
}
