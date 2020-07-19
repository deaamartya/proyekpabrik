<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock', function (Blueprint $table) {
            $table->string('id_stock',13)->primary();
            $table->foreign('id_satuan')->references('id_satuan')->on('satuan');
            $table->foreign('id_bahan_baku')->references('id_bahan_baku')->on('bahan_baku');
            $table->string('id_transaksi');
            $table->timestamp('TIMESTAMP');
            $table->string('keterangan',50);
            $table->double('masuk');
            $table->double('keluar');
            $table->double('stock');
            $table->foreign('id_gudang')->references('id_gudang')->on('gudang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock');
    }
}
