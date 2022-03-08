<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGajiPokoksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gaji_pokoks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_golongan_id');
            $table->string('masa_kerja');
            $table->string('besaran_gaji');
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
        Schema::dropIfExists('gaji_pokoks');
    }
}
