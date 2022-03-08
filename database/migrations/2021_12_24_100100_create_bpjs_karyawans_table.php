<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBpjsKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bpjs_karyawans', function (Blueprint $table) {
            $table->id();
            $table->integer('karyawan_id');
            $table->string('jenis_bpjs');
            $table->string('no_bpjs');
            $table->string('iuran_bulanan');
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
        Schema::dropIfExists('bpjs_karyawans');
    }
}
