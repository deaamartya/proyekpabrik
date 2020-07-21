<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SatuanTableSeeder::class);
        $this->call(GudangSeeder::class);
        $this->call(JabatanSeeder::class);
        $this->call(PegawaiSeeder::class);
        $this->call(ProvinsiSeeder::class);
        $this->call(KotaSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(TipeBahanBakuSeeder::class);
        $this->call(JenisPenerimaanSeeder::class);
        $this->call(JenisTransaksiSeeder::class);
        

    }
}
