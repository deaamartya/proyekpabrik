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
            $table->string('id_detail_susut_dlm_proses',18)->primary();
            $table->string('id_susut_dlm_proses', 17);
            $table->string('nama', 50);
            $table->boolean('tipe');
            $table->double('nilai');
            $table->foreign('id_susut_dlm_proses','id_susut_fk')->references('id_susut_dlm_proses')->on('susut_dlm_proses');
        });

        DB::unprepared("CREATE TRIGGER `auto_id_detail_susut_dlm_proses` BEFORE INSERT ON `detail_susut_dlm_proses`
             FOR EACH ROW BEGIN
                SELECT SUBSTRING((MAX(`id_detail_susut_dlm_proses`)),4,15) INTO @total FROM detail_susut_dlm_proses;
                IF (@total >= 1) THEN
                    SET new.id_detail_susut_dlm_proses = CONCAT('DSD',LPAD(@total+1,15,'0'));
                ELSE
                    SET new.id_detail_susut_dlm_proses = CONCAT('DSD',LPAD(1,15,'0'));
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
        Schema::dropIfExists('detail_susut_dlm_proses');
    }
}
