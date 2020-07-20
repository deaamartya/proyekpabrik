<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenerimaanSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerimaan_supplier', function (Blueprint $table) {
            $table->increments('id_pen_sup');
            $table->foreign('id_penerimaan')->references('id_pen_sup')->on('penerimaan');
            $table->double('berat_total');
            $table->double('berat_truk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penerimaan_supplier');
    }
}
