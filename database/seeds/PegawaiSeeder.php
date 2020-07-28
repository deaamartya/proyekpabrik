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
        /**
        contoh user.
        nama = Dea Amartya Damayanti (19 karakter)
        username = deaamartyadamayanti (max 20)
        password = deaamartyadamayanti (namakeseluruhannya)
        */


        $faker = Faker::create('id_ID');
        //pegawai tenaga kupas bawang
    	for($i = 1; $i <= 20; $i++){
            $namadepan = $faker->firstName;
            $namabelakang = $faker->lastName;
            $nama = $namadepan." ".$namabelakang;
    		DB::table('pegawai')->insert([
    			'id_gudang' => '7',
    			'id_jabatan' => '2',
    			'nama' => $nama,
    			'status' => 1,
    		]);
    	}

        //manager produksi
        $namadepan = $faker->firstName;
        $namabelakang = $faker->lastName;
        $nama = $namadepan." ".$namabelakang;
        DB::table('pegawai')->insert([
            'id_jabatan' => '3',
            'nama' => $nama,
            'password' => bcrypt(substr(str_replace(' ', '',strtolower($nama)),0,20)),
            'status' => 1,
            'username' => substr(str_replace(' ', '',strtolower($nama)),0,20),
        ]);

        //mandor kacang
        $namadepan = $faker->firstName;
        $namabelakang = $faker->lastName;
        $nama = $namadepan." ".$namabelakang;
        DB::table('pegawai')->insert([
            'id_gudang' => '9',
            'id_jabatan' => '1',
            'nama' => $nama,
            'password' => bcrypt(substr(str_replace(' ', '',strtolower($nama)),0,20)),
            'status' => 1,
            'username' => substr(str_replace(' ', '',strtolower($nama)),0,20),
        ]);

        //mandor masak kanji
        $namadepan = $faker->firstName;
        $namabelakang = $faker->lastName;
        $nama = $namadepan." ".$namabelakang;
        DB::table('pegawai')->insert([
            'id_gudang' => '8',
            'id_jabatan' => '1',
            'nama' => $nama,
            'password' => bcrypt(substr(str_replace(' ', '',strtolower($nama)),0,20)),
            'status' => 1,
            'username' => substr(str_replace(' ', '',strtolower($nama)),0,20),
        ]);


    }
}
