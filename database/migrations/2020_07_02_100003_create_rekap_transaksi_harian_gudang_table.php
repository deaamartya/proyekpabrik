<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRekapTransaksiHarianGudangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekap_transaksi_harian_gudang', function (Blueprint $table) {
            $table->string('id_rekap_transaksi_gudang',18)->primary();
            $table->integer('id_gudang')->unsigned();
            $table->foreign('id_gudang','id_gudang_fk')->references('id_gudang')->on('gudang')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamp('timestamp',0);
        });

        DB::unprepared("CREATE TRIGGER `auto_id_rekap_transaksi_gudang` BEFORE INSERT ON `rekap_transaksi_harian_gudang`
             FOR EACH ROW BEGIN
                SELECT SUBSTRING((MAX(`id_rekap_transaksi_gudang`)),4,15) INTO @total FROM rekap_transaksi_harian_gudang;
                IF (@total >= 1) THEN
                    SET new.id_rekap_transaksi_gudang = CONCAT('RTH',LPAD(@total+1,15,'0'));
                ELSE
                    SET new.id_rekap_transaksi_gudang = CONCAT('RTH',LPAD(1,15,'0'));
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
        Schema::dropIfExists('rekap_transaksi_harian_gudang');
    }
}
