<?php

use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jabatans = ['Mandor','Tenaga Kupas Bawang','Manager Produksi'];

    	foreach($jabatans as $j){
    		DB::table('jabatan')->insert([
	            'nama' => $j
	        ]);
    	}
    }
}
