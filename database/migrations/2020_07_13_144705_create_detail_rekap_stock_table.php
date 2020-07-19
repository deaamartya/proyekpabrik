<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailRekapStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_rekap_stock', function (Blueprint $table) {
            $table->string('id_detail_transaksi',11)->primary();
            $table->double('stock_awal',10,0);
            $table->double('stock_akhir',10,0);
            $table->foreign('id_detail_transaksi')->references('id_detail_transaksi')->on('detail_transkasi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_rekap_stock');
    }
}
