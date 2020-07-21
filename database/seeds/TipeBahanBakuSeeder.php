<?php

use Illuminate\Database\Seeder;

class TipeBahanBakuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipe_bahan_baku')->insert([
            'nama' => 'Bahan Mentah'
        ]);
        DB::table('tipe_bahan_baku')->insert([
            'nama' => 'Work in Process'
        ]);
    }
}
