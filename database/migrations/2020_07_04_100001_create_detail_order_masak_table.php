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
            $table->double('presentase_status', 8, 2)->nullable()->default(0);
            $table->foreign('id_order_masak')->references('id_order_masak')->on('order_masak');
        });

        DB::unprepared("CREATE TRIGGER `auto_id_ordermasak` BEFORE INSERT ON `detail_order_masak`
             FOR EACH ROW BEGIN
                SELECT id_order_masak FROM order_masak
                ORDER BY id_order_masak DESC
                LIMIT 1
                INTO @new_id_ordermasak;
                SET NEW.id_order_masak = @new_id_ordermasak;
            END");
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
