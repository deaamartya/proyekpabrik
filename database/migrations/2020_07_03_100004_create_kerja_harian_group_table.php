<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKerjaHarianGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kerja_harian_group', function (Blueprint $table) {
            $table->string('id_kerja_harian_group',18)->primary();
            $table->string('id_group_kerja',18);
            $table->date('tanggal');
            $table->string('id_pegawai',20);
            $table->foreign('id_group_kerja')->references('id_group_kerja')->on('group_kerja');
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawai');
        });
        DB::unprepared("CREATE TRIGGER `auto_id_kerja_harian_group` BEFORE INSERT ON `kerja_harian_group`
             FOR EACH ROW BEGIN
                SELECT SUBSTRING((MAX(`id_kerja_harian_group`)),4,15) INTO @total FROM kerja_harian_group;
                IF (@total >= 1) THEN
                    SET new.id_kerja_harian_group = CONCAT('KHG',LPAD(@total+1,15,'0'));
                ELSE
                    SET new.id_kerja_harian_group = CONCAT('KHG',LPAD(1,15,'0'));
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
        DB::unprepared('DROP TRIGGER `auto_id_kerja_harian_group`');
        Schema::dropIfExists('kerja_harian_group');
    }
}
