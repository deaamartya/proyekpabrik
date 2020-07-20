<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeratIdealTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berat_ideal', function (Blueprint $table) {
            $table->string('id_berat_ideal',4)->primary();
            $table->double('berat_ideal_kg');
            $table->unsignedInteger('id_satuan');
            $table->string('id_bahan_baku',11);
            $table->foreign('id_satuan')->references('id_satuan')->on('satuan');
            $table->foreign('id_bahan_baku')->references('id_bahan_baku')->on('bahan_baku');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berat_ideal');
    }
}
