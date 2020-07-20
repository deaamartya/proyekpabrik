<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier', function (Blueprint $table) {
            $table->string('id_supplier',10)->primary();
            $table->string('nama',50);
            $table->string('alamat',100);
            $table->string('email',50);
            $table->string('kontak_person',50);
            $table->string('NPWP',20);
            $table->integer('id_kota')->unsigned();
            $table->foreign('id_kota')->references('id_kota')->on('kota')->onUpdate('cascade')->onDelete('cascade');
            
        });
        DB::unprepared("CREATE TRIGGER `auto_id_supplier` BEFORE INSERT ON `supplier`
             FOR EACH ROW BEGIN
                SELECT SUBSTRING((MAX(`id_supplier`)),3,8) INTO @total FROM supplier;
                IF (@total >= 1) THEN
                    SET new.id_supplier = CONCAT('SP',LPAD(@total+1,8,'0'));
                ELSE
                    SET new.id_supplier = CONCAT('SP',LPAD(1,8,'0'));
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
        DB::unprepared('DROP TRIGGER `auto_id_supplier`');
        Schema::dropIfExists('supplier');
    }
}
