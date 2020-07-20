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
            $table->string('username',20)->unique();
            $table->string('password');
            $table->unsignedInteger('id_jabatan');
            $table->unsignedInteger('id_gudang');
            $table->boolean('status');
            $table->foreign('id_jabatan')->references('id_jabatan')->on('jabatan');
            $table->foreign('id_gudang')->references('id_gudang')->on('gudang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
}
