<?php

use Illuminate\Database\Seeder;

class GroupKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group_kerja')->insert([
    		'id_gudang' => '7',
    		'nama' => 'Kupas Bawang',
    		'jumlah_personil' => '0',
    		'level' => '0',
    		'parent_id_group_kerja' => null,
    	]);
    }
}
