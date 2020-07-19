<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRekapTransaksiHarianGudangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekap_transaksi_harian_gudang', function (Blueprint $table) {
            $table->string('id_rekap_transaksi_gudang',18)->primary();
            $table->integer('id_gudang')->unsigned();
            $table->foreign('id_gudang')->references('id_gudang')->on('gudang')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamp('timestamp',0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekap_transaksi_harian_gudang');
    }
}
