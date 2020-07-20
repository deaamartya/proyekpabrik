<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->string('id_product',13)->primary();
            $table->string('nama', 50);
           
        });

         DB::unprepared("CREATE TRIGGER `auto_id_product` BEFORE INSERT ON `product`
             FOR EACH ROW BEGIN
                SELECT SUBSTRING((MAX(`id_product`)),3,11) INTO @total FROM product;
                IF (@total >= 1) THEN
                    SET new.id_product = CONCAT('PR',LPAD(@total+1,11,'0'));
                ELSE
                    SET new.id_product = CONCAT('PR',LPAD(1,11,'0'));
                END IF;
          
            END");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
