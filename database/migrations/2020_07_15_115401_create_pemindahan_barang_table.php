<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemindahanBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemindahan_barang', function (Blueprint $table) {
            $table->string('id_pemindahan_barang')->primary();
            $table->timestamps('timestamp');
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
