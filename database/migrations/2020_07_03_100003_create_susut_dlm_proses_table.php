<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSusutDlmProsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('susut_dlm_proses', function (Blueprint $table) {
            $table->string('id_susut_dlm_proses',17)->primary();
            $table->string('id_rekap_kerja_harian_group',18);
            $table->string('id_rekap_transaksi_harian_gudang',18);
            $table->timestamp('timestamp');
            $table->double('input');
            $table->double('output');
            $table->double('berat_susut_kg');
            $table->double('berat_susut_persen');
            $table->foreign('id_rekap_kerja_harian_group','rekap_harian_grup_fk')->references('id_rekap_kerja_harian_group')->on('rekap_kerja_harian_group');
            $table->foreign('id_rekap_transaksi_harian_gudang','rekap_harian_gudang_fk')->references('id_rekap_transaksi_gudang')->on('rekap_transaksi_harian_gudang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('susut_dlm_proses');
    }
}
