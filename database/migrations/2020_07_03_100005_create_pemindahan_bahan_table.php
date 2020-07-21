<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemindahanBahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemindahan_bahan', function (Blueprint $table) {
            $table->string('id_pemindahan_bahan',18)->primary();
            $table->timestamp('timestamp');
            $table->unsignedInteger('id_gudang_asal');
            $table->unsignedInteger('id_gudang_tujuan');
            $table->string('id_pegawai',20);

            $table->foreign('id_gudang_asal')->references('id_gudang')->on('gudang');
            $table->foreign('id_gudang_tujuan')->references('id_gudang')->on('gudang');
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawai');
        });
        DB::unprepared("CREATE TRIGGER `auto_id_pemindahan_bahan` BEFORE INSERT ON `pemindahan_bahan`
             FOR EACH ROW BEGIN
                SELECT SUBSTRING((MAX(`id_pemindahan_bahan`)),3,16) INTO @total FROM pemindahan_bahan;
                IF (@total >= 1) THEN
                    SET new.id_pemindahan_bahan = CONCAT('PB',LPAD(@total+1,16,'0'));
                ELSE
                    SET new.id_pemindahan_bahan = CONCAT('PB',LPAD(1,16,'0'));
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
        DB::unprepared('DROP TRIGGER `auto_id_pemindahan_bahan`');
        Schema::dropIfExists('pemindahan_barang');
    }
}
