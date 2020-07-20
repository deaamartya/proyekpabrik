<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupKerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_kerja', function (Blueprint $table) {
            $table->string('id_group_kerja');
            $table->primary('id_group_kerja');
            $table->integer('id_gudang')->unsigned();
            $table->foreign('id_gudang')->references('id_gudang')->on('gudang')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama', 20);
            $table->integer('jumlah_personil')->unsigned();
            $table->boolean('level');
            $table->string('parent_id_group_kerja')->nullable();
            $table->foreign('parent_id_group_kerja')->references('id_group_kerja')->on('group_kerja')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_kerja');


    }
}
