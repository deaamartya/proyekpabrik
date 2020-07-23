<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->string('id_detail_transaksi',11)->primary();
            $table->unsignedInteger('id_satuan');
            $table->string('id_transaksi',18);
            $table->double('jumlah',8,0);
            $table->string('id_bahan_baku',11);
            $table->unsignedInteger('id_jenis_transaksi');
            $table->timestamp('timestamp');
            $table->foreign('id_satuan')->references('id_satuan')->on('satuan');
            $table->foreign('id_bahan_baku')->references('id_bahan_baku')->on('bahan_baku');
            $table->foreign('id_jenis_transaksi')->references('id_jenis_transaksi')->on('jenis_transaksi');
        });
        DB::unprepared("CREATE TRIGGER `auto_id_detail_transaksi` BEFORE INSERT ON `detail_transaksi`
             FOR EACH ROW BEGIN
                SELECT SUBSTRING((MAX(`id_detail_transaksi`)),3,9) INTO @total FROM detail_transaksi;
                IF (@total >= 1) THEN
                    SET new.id_detail_transaksi = CONCAT('DT',LPAD(@total+1,9,'0'));
                ELSE
                    SET new.id_detail_transaksi = CONCAT('DT',LPAD(1,9,'0'));
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
        DB::unprepared('DROP TRIGGER `auto_id_detail_transaksi`');
        Schema::dropIfExists('detail_transaksi');
    }
}
