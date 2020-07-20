<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderMasakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_masak', function (Blueprint $table) {
            $table->string('id_order_masak',13)->primary();
            $table->timestamp('timestamp_buat');
            $table->date('tanggal_order_masak');
            $table->string('id_pegawai',20);
            $table->boolean('status');
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
        Schema::dropIfExists('order_masak');
    }
}
