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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kerja_harian_group');
    }
}
