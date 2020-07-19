<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailKupasBawangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_kupas_bawang', function (Blueprint $table) {            
            $table->foreign('id_detail_transaksi')->references('id_detail_transaksi')->on('detail_transaksi');
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawai');
            $table->float('kulit', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_kupas_bawang');
    }
}
