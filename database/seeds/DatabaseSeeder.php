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
    }
}
