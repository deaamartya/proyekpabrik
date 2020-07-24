<?php

use Illuminate\Database\Seeder;

class BahanBakuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bahan_baku')->insert([
            'nama' => 'Garam',
            'status'=>1,
            'id_tipe_bahan_baku'=>1
        ]);

        DB::table('bahan_baku')->insert([
            'nama' => 'Gula',
            'status'=>1,
            'id_tipe_bahan_baku'=>1
        ]);

        DB::table('bahan_baku')->insert([
            'nama' => 'Kacang OB',
            'status'=>1,
            'id_tipe_bahan_baku'=>2
        ]);

        DB::table('bahan_baku')->insert([
            'nama' => 'Kacang 7 ml',
            'status'=>1,
            'id_tipe_bahan_baku'=>2
        ]);

        DB::table('bahan_baku')->insert([
            'nama' => 'Kacang 8 ml',
            'status'=>1,
            'id_tipe_bahan_baku'=>2
        ]);

        DB::table('bahan_baku')->insert([
            'nama' => 'Bawang Kulit',
            'status'=>1,
            'id_tipe_bahan_baku'=>2
        ]);

        DB::table('bahan_baku')->insert([
            'nama' => 'Tepung Tapioka',
            'status'=>1,
            'id_tipe_bahan_baku'=>2
        ]);

        DB::table('bahan_baku')->insert([
            'nama' => 'Bawang Kupas',
            'status'=>1,
            'id_tipe_bahan_baku'=>2
        ]);
    }
}
