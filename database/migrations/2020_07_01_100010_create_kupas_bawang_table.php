<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKupasBawangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kupas_bawang', function (Blueprint $table) {
            $table->string('id_kupas_bawang',10)->primary();
            $table->date('tanggal_beri');
        });
        DB::unprepared("CREATE TRIGGER `auto_id_kupas_bawang` BEFORE INSERT ON `kupas_bawang`
             FOR EACH ROW BEGIN
                SELECT SUBSTRING((MAX(`id_kupas_bawang`)),3,8) INTO @total FROM kupas_bawang;
                IF (@total >= 1) THEN
                    SET new.id_kupas_bawang = CONCAT('KB',LPAD(@total+1,8,'0'));
                ELSE
                    SET new.id_kupas_bawang = CONCAT('KB',LPAD(1,8,'0'));
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
        DB::unprepared('DROP TRIGGER `auto_id_kupas_bawang`');
        Schema::dropIfExists('kupas_bawang');
    }
}
