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

        DB::unprepared("CREATE TRIGGER `auto_id_susut_dlm_proses` BEFORE INSERT ON `susut_dlm_proses`
             FOR EACH ROW BEGIN
                SELECT SUBSTRING((MAX(`id_susut_dlm_proses`)),2,16) INTO @total FROM susut_dlm_proses;
                IF (@total >= 1) THEN
                    SET new.id_susut_dlm_proses = CONCAT('S',LPAD(@total+1,16,'0'));
                ELSE
                    SET new.id_susut_dlm_proses = CONCAT('S',LPAD(1,16,'0'));
                END IF;
          
            END");
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
