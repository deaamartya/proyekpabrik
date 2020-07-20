<?php

use Illuminate\Database\Seeder;

class GudangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$gudang = ['coolstorage I','coolstorage II','coolstorage III',
    		'Gudang Bumbu','Gudang Tapioka','Gudang Tepung Besar','Gudang Bawang'];

    	foreach($gudang as $g){
    		DB::table('gudang')->insert([
	            'nama' => $g,
	            'status' => 1
	        ]);
    	}
  
    }
}
