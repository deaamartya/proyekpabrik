<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBahanBakuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bahan_baku', function (Blueprint $table) {
            $table->string('id_bahan_baku',11)->primary();
            $table->string('nama', 50);
            $table->boolean('status');
            $table->unsignedInteger('id_tipe_bahan_baku');
            $table->foreign('id_tipe_bahan_baku')->references('id_tipe_bahan_baku')->on('tipe_bahan_baku');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bahan_baku');
    }
}
