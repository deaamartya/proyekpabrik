<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = ['HC','SP','GS', 'Telor', 'Bawang Kupas', 'Packing'];

    	foreach($products as $p){
    		DB::table('product')->insert([
	            'nama' => $p
	        ]);
    	}
    }
}
