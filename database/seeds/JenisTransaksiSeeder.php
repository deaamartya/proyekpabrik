<?php

use Illuminate\Database\Seeder;

class JenisTransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_transaksi')->insert([
            'nama' => 'Kupas Bawang Beri'
        ]);
        DB::table('jenis_transaksi')->insert([
            'nama' => 'Kupas Bawang Terima'
        ]);

        DB::table('jenis_transaksi')->insert([
            'nama' => 'Penerimaan Supplier'
        ]);

        DB::table('jenis_transaksi')->insert([
            'nama' => 'Pemindahan Bahan'
        ]);

        DB::table('jenis_transaksi')->insert([
            'nama' => 'Sortir Kacang'
        ]);
    }
}
