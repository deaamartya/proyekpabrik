<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailSusutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_susut', function (Blueprint $table) {
            $table->string('id_detail_susut', 11)->primary();
            $table->string('nama',30);
            $table->double('berat_susut_kg');
            $table->double('berat_susut_persen');
            $table->double('berat_kirim');
            $table->string('id_detail_transaksi',11);
            $table->foreign('id_detail_transaksi')->references('id_detail_transaksi')->on('detail_transaksi');
        });

        DB::unprepared("CREATE TRIGGER `auto_id_detail_susut` BEFORE INSERT ON `detail_susut`
             FOR EACH ROW BEGIN
                SELECT SUBSTRING((MAX(`id_detail_susut`)),3,9) INTO @total FROM detail_susut;
                IF (@total >= 1) THEN
                    SET new.id_detail_susut = CONCAT('DS',LPAD(@total+1,9,'0'));
                ELSE
                    SET new.id_detail_susut = CONCAT('DS',LPAD(1,9,'0'));
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
        Schema::dropIfExists('detail_susut');
    }
}
