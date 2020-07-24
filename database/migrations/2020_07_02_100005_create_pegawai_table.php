<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->string('id_pegawai',20)->primary();
            $table->string('nama',50);
            $table->string('username',20)->unique()->nullable();
            $table->string('password')->nullable();
            $table->unsignedInteger('id_jabatan');
            $table->unsignedInteger('id_gudang')->nullable();
            $table->boolean('status');
            $table->foreign('id_jabatan')->references('id_jabatan')->on('jabatan');
            $table->foreign('id_gudang')->references('id_gudang')->on('gudang');
        });
        DB::unprepared("CREATE TRIGGER `auto_id_pegawai` BEFORE INSERT ON `pegawai`
             FOR EACH ROW BEGIN
                SELECT SUBSTRING((MAX(`id_pegawai`)),4,17) INTO @total FROM pegawai;
                IF (@total >= 1) THEN
                    SET new.id_pegawai = CONCAT('PEG',LPAD(@total+1,17,'0'));
                ELSE
                    SET new.id_pegawai = CONCAT('PEG',LPAD(1,17,'0'));
                END IF;
            SET NEW.status = 1;
            END");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `auto_id_pegawai`');
        Schema::dropIfExists('pegawai');

    }
}
