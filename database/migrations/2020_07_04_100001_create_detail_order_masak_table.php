<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailOrderMasakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_order_masak', function (Blueprint $table) {
            $table->string('id_order_masak', 13);
            $table->string('id_bahan_product', 50);
            $table->boolean('jenis_order');
            $table->integer('jumlah');
            $table->foreign('id_order_masak')->references('id_order_masak')->on('order_masak');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_order_masak');
    }
}
