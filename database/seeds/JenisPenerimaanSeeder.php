<?php

use Illuminate\Database\Seeder;

class JenisPenerimaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_penerimaan')->insert([
            'nama_jenis_penerimaan' => 'Penerimaan dari Supplier'
        ]);
        DB::table('jenis_penerimaan')->insert([
            'nama_jenis_penerimaan' => 'Penerimaan dari Pemindahan Bahan'
        ]);
    }
}
