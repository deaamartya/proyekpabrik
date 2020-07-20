<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderMasakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_masak', function (Blueprint $table) {
            $table->string('id_order_masak',13)->primary();
            $table->timestamp('timestamp_buat');
            $table->date('tanggal_order_masak');
            $table->string('id_pegawai',20);
            $table->boolean('status');
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawai');
        });

        DB::unprepared("CREATE TRIGGER `auto_id_order_masak` BEFORE INSERT ON `order_masak`
             FOR EACH ROW BEGIN
                SELECT SUBSTRING((MAX(`id_order_masak`)),4,6) INTO @tanggal FROM order_masak;
                SELECT DATE_FORMAT(CURRENT_DATE, '%y%m%d') INTO @currentdate;
                SELECT SUBSTRING((MAX(`id_order_masak`)),10,4) INTO @total FROM order_masak;
                SELECT STRCMP(@tanggal,@currentdate) INTO @check;
                IF(@total >=1) THEN
                    IF(@check = 0) THEN
                        SET new.id_order_masak = CONCAT('ORM', @currentdate ,LPAD(@total+1,4,'0'));
                    ELSE
                        SET new.id_order_masak = CONCAT('ORM', @currentdate ,LPAD(1,4,'0'));
                    END IF;
                ELSE
                    SET new.id_order_masak = CONCAT('ORM', @currentdate ,LPAD(1,4,'0'));
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
        Schema::dropIfExists('order_masak');
    }
}
