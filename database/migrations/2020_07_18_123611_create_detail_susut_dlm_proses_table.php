<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailSusutDlmProsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_susut_dlm_proses', function (Blueprint $table) {
            $table->increments('id_detail_susut_dlm_proses');
            $table->foreign('id_susut_dml_proses')->references('id_detail_susut_dlm_proses')->on('susut_dlm_proses');
            $table->string('nama', 50);
            $table->boolean('tipe');
            $table->double('nilai');
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
        Schema::dropIfExists('detail_susut_dlm_proses');
    }
}
