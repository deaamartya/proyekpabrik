<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenerimaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerimaan', function (Blueprint $table) {
            $table->string('id_penerimaan',18)->primary();
            $table->timestamp('timestamp');
            $table->string('id_transaksi', 18);
            $table->unsignedInteger('id_jenis_penerimaan');
            $table->unsignedInteger('id_gudang');
            $table->foreign('id_jenis_penerimaan')->references('id_jenis_penerimaan')->on('jenis_penerimaan');
            $table->foreign('id_gudang')->references('id_gudang')->on('gudang')->onUpdate('cascade')->onDelete('cascade');
        });
        DB::unprepared("CREATE TRIGGER `auto_id_penerimaan` BEFORE INSERT ON `penerimaan`
             FOR EACH ROW BEGIN
                SELECT SUBSTRING((MAX(`id_penerimaan`)),3,16) INTO @total FROM penerimaan;
                IF (@total >= 1) THEN
                    SET new.id_penerimaan = CONCAT('PR',LPAD(@total+1,16,'0'));
                ELSE
                    SET new.id_penerimaan = CONCAT('PR',LPAD(1,16,'0'));
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
        DB::unprepared('DROP TRIGGER `auto_id_penerimaan`');
        Schema::dropIfExists('penerimaan');
    }
}
