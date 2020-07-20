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
            $table->string('id_susut_dlm_proses', 18);
            $table->string('nama', 50);
            $table->boolean('tipe');
            $table->double('nilai');
            $table->foreign('id_susut_dlm_proses','id_susut_fk')->references('id_susut_dlm_proses')->on('susut_dlm_proses');
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
