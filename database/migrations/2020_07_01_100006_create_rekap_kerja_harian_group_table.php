<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRekapKerjaHarianGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekap_kerja_harian_group', function (Blueprint $table) {
            $table->string('id_rekap_kerja_harian_group', 18)->primary();
            $table->timestamp('timestamp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekap_kerja_harian_group');
    }
}
