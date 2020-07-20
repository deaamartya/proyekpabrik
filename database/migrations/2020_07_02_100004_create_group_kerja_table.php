<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupKerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_kerja', function (Blueprint $table) {
            $table->string('id_group_kerja',11);
            $table->primary('id_group_kerja');
            $table->integer('id_gudang')->unsigned();
            $table->foreign('id_gudang')->references('id_gudang')->on('gudang')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama', 20);
            $table->integer('jumlah_personil')->unsigned();
            $table->boolean('level');
            $table->string('parent_id_group_kerja')->nullable();
            $table->foreign('parent_id_group_kerja')->references('id_group_kerja')->on('group_kerja')->onUpdate('cascade')->onDelete('cascade');
        });

        DB::unprepared("CREATE TRIGGER `auto_id_group_kerja` BEFORE INSERT ON `group_kerja`
             FOR EACH ROW BEGIN
                SELECT SUBSTRING((MAX(`id_group_kerja`)),2,10) INTO @total FROM group_kerja;
                IF (@total >= 1) THEN
                    SET new.id_group_kerja = CONCAT('G',LPAD(@total+1,10,'0'));
                ELSE
                    SET new.id_group_kerja = CONCAT('G',LPAD(1,10,'0'));
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
        Schema::dropIfExists('group_kerja');


    }
}
