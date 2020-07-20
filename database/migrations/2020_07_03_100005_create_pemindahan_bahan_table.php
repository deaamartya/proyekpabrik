<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemindahanBahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemindahan_bahan', function (Blueprint $table) {
            $table->string('id_pemindahan_bahan')->primary();
            $table->timestamp('timestamp');
            $table->unsignedInteger('id_gudang_asal');
            $table->unsignedInteger('id_gudang_tujuan');
            $table->string('id_pegawai',20);

            $table->foreign('id_gudang_asal')->references('id_gudang')->on('gudang');
            $table->foreign('id_gudang_tujuan')->references('id_gudang')->on('gudang');
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemindahan_barang');
    }
}
