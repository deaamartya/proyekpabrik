<?php

use Flynsarmy\CsvSeeder\CsvSeeder;
// use Illuminate\Database\Seeder;

class KotaSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'kota';
        $this->filename = base_path().'/database/seeds/csv/kota.csv';
        $this->offset_rows = 1;
        $this->mapping = [
            0 => 'id_kota',
            1 => 'nama',
            2 => 'id_provinsi',
        ];
        $this->should_trim = true;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Recommended when importing larger CSVs
		DB::disableQueryLog();

		// Uncomment the below to wipe the table clean before populating
		// DB::table($this->table)->truncate();

		parent::run();
    }
}
