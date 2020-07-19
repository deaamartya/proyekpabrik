<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailSusutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_susut', function (Blueprint $table) {
            $table->increments('id_detail_susut');
            $table->string('nama');
            $table->double('berat_susut_kg');
            $table->double('berat_susut_persen');
            $table->double('berat_kirim');
            $table->foreign('id_detail_transaksi')->references('id_detail_transaksi')->on('detail_transaksi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_susut');
    }
}
