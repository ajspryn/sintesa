<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id('id');
            $table->string('foto')->nullable();
            $table->string('nik');
            $table->string('nip');
            $table->string('nama');
            $table->text('alamat');
            $table->date('tgl_lahir');
            $table->string('kelamin');
            $table->string('pendidikan_id');
            $table->string('status_karyawan_id');
            $table->date('tgl_masuk_karyawan');
            $table->date('tgl_pengangkatan')->nullable();
            $table->string('jabatan_id');
            $table->string('divisi_id');
            $table->string('golongan_id');
            $table->string('no_hp');
            $table->string('gol_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawans');
    }
}
