<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailRekapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_rekap', function (Blueprint $table) {
            $table->string('id_detail_transaksi')->primary();
            $table->foreign('id_detail_transaksi')->references('id_detail_transaksi')->on('detail_transaksi')->onUpdate('cascade')->onDelete('cascade');
            $table->double('berat_wadah_kosong', 8, 2);
            $table->double('berat_BS', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_rekap');
    }
}
