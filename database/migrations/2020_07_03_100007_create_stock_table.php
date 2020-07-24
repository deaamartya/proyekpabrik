<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock', function (Blueprint $table) {
            $table->string('id_stock',13)->primary();
            $table->unsignedInteger('id_satuan');
            $table->string('id_transaksi',11);
            $table->string('id_bahan_baku',18);
            $table->timestamp('TIMESTAMP');
            $table->string('keterangan',50);
            $table->double('masuk');
            $table->double('keluar');
            $table->double('stock');
            $table->unsignedInteger('id_gudang');
            $table->foreign('id_gudang')->references('id_gudang')->on('gudang');
            $table->foreign('id_satuan')->references('id_satuan')->on('satuan');
            $table->foreign('id_bahan_baku')->references('id_bahan_baku')->on('bahan_baku');
        });
        DB::unprepared("CREATE TRIGGER `auto_id_stock` BEFORE INSERT ON `stock`
             FOR EACH ROW BEGIN
                SELECT SUBSTRING((MAX(`id_stock`)),3,11) INTO @total FROM stock;
                IF (@total >= 1) THEN
                    SET new.id_stock = CONCAT('ST',LPAD(@total+1,11,'0'));
                ELSE
                    SET new.id_stock = CONCAT('ST',LPAD(1,11,'0'));
                END IF;
            END");

        DB::unprepared("CREATE TRIGGER `auto_count_stock` BEFORE INSERT ON `stock`
             FOR EACH ROW BEGIN
                SELECT `stock` INTO @last FROM stock WHERE id_bahan_baku = new.id_bahan_baku AND id_gudang = new.id_gudang ORDER BY `TIMESTAMP`;
                    IF (@last >= 0) THEN
                        SET new.stock = @last+new.masuk-new.keluar;
                    ELSE
                        SET new.stock = new.masuk-new.keluar;
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
        DB::unprepared('DROP TRIGGER `auto_id_stock`');
        Schema::dropIfExists('stock');
    }
}
