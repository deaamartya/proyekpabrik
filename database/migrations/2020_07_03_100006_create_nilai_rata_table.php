<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaiRataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_rata', function (Blueprint $table) {
            $table->increments('id_nilai_rata');
            $table->unsignedInteger('satuan_besar');
            $table->unsignedInteger('satuan_kecil');
            $table->string('id_bahan_baku',11);
            $table->double('nilai');
            $table->timestamp('timestamp');
            $table->foreign('satuan_besar')->references('id_satuan')->on('satuan');
            $table->foreign('satuan_kecil')->references('id_satuan')->on('satuan');
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
        Schema::dropIfExists('nilai_rata_tabe');
    }
}
