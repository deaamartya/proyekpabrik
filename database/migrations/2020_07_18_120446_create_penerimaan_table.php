<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenerimaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerimaan', function (Blueprint $table) {
            $table->increments('id_penerimaan');
            $table->timestamps();
            $table->string('id_transaksi', 50);
            $table->foreign('id_jenis_penerimaan')->references('id_penerimaan')->on('jenis_penerimaan');
            $table->foreign('id_gudang')->references('id_penerimaan')->on('gudang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penerimaan');
    }
}
