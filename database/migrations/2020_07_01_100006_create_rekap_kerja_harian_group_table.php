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

        DB::unprepared("CREATE TRIGGER `auto_id_rekap_kerja_harian_group` BEFORE INSERT ON `rekap_kerja_harian_group`
             FOR EACH ROW BEGIN
                SELECT SUBSTRING((MAX(`id_rekap_kerja_harian_group`)),4,15) INTO @total FROM rekap_kerja_harian_group;
                IF (@total >= 1) THEN
                    SET new.id_rekap_kerja_harian_group = CONCAT('RKH',LPAD(@total+1,15,'0'));
                ELSE
                    SET new.id_rekap_kerja_harian_group = CONCAT('RKH',LPAD(1,15,'0'));
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
        Schema::dropIfExists('rekap_kerja_harian_group');
    }
}
