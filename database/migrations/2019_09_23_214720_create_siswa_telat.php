<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiswaTelat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa_telat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('siswa_id');
            $table->time('pukul_telat');
            $table->time('batas_waktu_sanksi');
            $table->string('ket_sanksi');
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
        Schema::dropIfExists('siswa_telat');
    }
}
