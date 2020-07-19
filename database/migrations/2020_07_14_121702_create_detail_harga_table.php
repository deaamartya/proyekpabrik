<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailHargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_harga', function (Blueprint $table) {
            $table->bigIncrements('id_detail_transaksi',);
            $table->double('harga',10,2);
            $table->double('subtotal',10,2);
            $table->boolean('mata_uang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_harga');
    }
}
