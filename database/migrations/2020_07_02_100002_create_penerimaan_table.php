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
            $table->string('id_penerimaan',18)->primary();
            $table->timestamp('timestamp');
            $table->string('id_transaksi', 18);
            $table->unsignedInteger('id_jenis_penerimaan');
            $table->unsignedInteger('id_gudang');
            $table->foreign('id_jenis_penerimaan')->references('id_jenis_penerimaan')->on('jenis_penerimaan');
            $table->foreign('id_gudang')->references('id_gudang')->on('gudang')->onUpdate('cascade')->onDelete('cascade');
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
