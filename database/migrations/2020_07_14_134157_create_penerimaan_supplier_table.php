<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenerimaanSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerimaan_supplier', function (Blueprint $table) {
            $table->string('id_penerimaan',18)->primary();
            $table->foreign('id_penerimaan')->references('id_penerimaan')->on('penerimaan')->onUpdate('cascade')->onDelete('cascade');
            $table->string('id_supplier',10);
            $table->foreign('id_supplier')->references('id_supplier')->on('supplier')->onUpdate('cascade')->onDelete('cascade');
            $table->double('berat_surat_jalan', 8, 2);
            $table->double('berat_aktual', 8, 2);
            $table->string('nomor_kontainer');
            $table->string('nomor_polisi');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penerimaan_supplier');
    }
}
