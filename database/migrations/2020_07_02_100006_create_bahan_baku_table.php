<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBahanBakuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bahan_baku', function (Blueprint $table) {
            $table->string('id_bahan_baku',11)->primary();
            $table->string('nama', 50);
            $table->boolean('status');
            $table->unsignedInteger('id_tipe_bahan_baku');
            $table->foreign('id_tipe_bahan_baku')->references('id_tipe_bahan_baku')->on('tipe_bahan_baku');
        });
        DB::unprepared("CREATE TRIGGER `auto_id_bahan_baku` BEFORE INSERT ON `bahan_baku`
             FOR EACH ROW BEGIN
                SELECT SUBSTRING((MAX(`id_bahan_baku`)),3,9) INTO @total FROM bahan_baku;
                IF (@total >= 1) THEN
                    SET new.id_bahan_baku = CONCAT('BB',LPAD(@total+1,9,'0'));
                ELSE
                    SET new.id_bahan_baku = CONCAT('BB',LPAD(1,9,'0'));
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
        DB::unprepared('DROP TRIGGER `auto_id_bahan_baku`');
        Schema::dropIfExists('bahan_baku');
    }
}
