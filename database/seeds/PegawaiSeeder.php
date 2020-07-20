<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
 	//pegawai tenaga kupas bawang
    	for($i = 1; $i <= 15; $i++){
            $namadepan = $faker->firstName;
            $namabelakang = $faker->lastName;
            $nama = $namadepan." ".$namabelakang;
    		DB::table('pegawai')->insert([
    			'id_gudang' => '7',
    			'id_jabatan' => '2',
    			'nama' => $nama,
    			'password' => encrypt(substr(str_replace(' ', '',strtolower($nama)),0,20)),
    			'status' => 1,
    			'username' => substr(str_replace(' ', '',strtolower($nama)),0,20),
    		]);
    	}
    }
}
