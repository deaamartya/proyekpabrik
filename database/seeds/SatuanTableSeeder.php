<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SatuanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('satuan')->insert([
            'nama' => 'kg',
            'status' => 1
        ]);
        DB::table('satuan')->insert([
            'nama' => 'plastik',
            'status' => 2
        ]);
    }
}
