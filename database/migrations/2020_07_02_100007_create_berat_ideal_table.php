<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeratIdealTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berat_ideal', function (Blueprint $table) {
            $table->string('id_berat_ideal',4)->primary();
            $table->double('berat_ideal_kg');
            $table->unsignedInteger('id_satuan');
            $table->string('id_bahan_baku',11);
            $table->foreign('id_satuan')->references('id_satuan')->on('satuan');
            $table->foreign('id_bahan_baku')->references('id_bahan_baku')->on('bahan_baku');
        });
        DB::unprepared("CREATE TRIGGER `auto_id_berat_ideal` BEFORE INSERT ON `berat_ideal`
             FOR EACH ROW BEGIN
                SELECT SUBSTRING((MAX(`id_berat_ideal`)),2,3) INTO @total FROM berat_ideal;
                IF (@total >= 1) THEN
                    SET new.id_berat_ideal = CONCAT('B',LPAD(@total+1,3,'0'));
                ELSE
                    SET new.id_berat_ideal = CONCAT('B',LPAD(1,3,'0'));
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
        DB::unprepared('DROP TRIGGER `auto_id_berat_ideal`');
        Schema::dropIfExists('berat_ideal');
    }
}
