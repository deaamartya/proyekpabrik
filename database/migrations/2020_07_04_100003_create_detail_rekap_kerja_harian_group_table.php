<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailRekapKerjaHarianGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_rekap_kerja_harian_group', function (Blueprint $table) {
            $table->string('id_kerja_harian_group', 18);
            $table->string('id_rekap_kerja_harian_group', 18);
            $table->foreign('id_kerja_harian_group','id_kerja_harian_fk')->references('id_kerja_harian_group')->on('kerja_harian_group')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_rekap_kerja_harian_group','id_rekap_harian_fk')->references('id_rekap_kerja_harian_group')->on('rekap_kerja_harian_group')->onUpdate('cascade')->onDelete('cascade');
        });

      

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_rekap_kerja_harian_group');
    }
}
