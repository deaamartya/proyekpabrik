<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaiRataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_rata', function (Blueprint $table) {
            $table->string('id_nilai_rata', 9)->primary();
            $table->unsignedInteger('satuan_besar');
            $table->unsignedInteger('satuan_kecil');
            $table->string('id_bahan_baku',11);
            $table->double('nilai');
            $table->timestamp('timestamp');
            $table->foreign('satuan_besar')->references('id_satuan')->on('satuan');
            $table->foreign('satuan_kecil')->references('id_satuan')->on('satuan');
            $table->foreign('id_bahan_baku')->references('id_bahan_baku')->on('bahan_baku');
        });

         DB::unprepared("CREATE TRIGGER `auto_id_nilai_rata` BEFORE INSERT ON `nilai_rata`
             FOR EACH ROW BEGIN
                SELECT SUBSTRING((MAX(`id_nilai_rata`)),3,7) INTO @total FROM nilai_rata;
                IF (@total >= 1) THEN
                    SET new.id_nilai_rata = CONCAT('NR',LPAD(@total+1,7,'0'));
                ELSE
                    SET new.id_nilai_rata = CONCAT('NR',LPAD(1,7,'0'));
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
        Schema::dropIfExists('nilai_rata_tabe');
    }
}
