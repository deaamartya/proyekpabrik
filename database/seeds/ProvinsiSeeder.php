<?php

use Flynsarmy\CsvSeeder\CsvSeeder;
// use Illuminate\Database\Seeder;

class ProvinsiSeeder extends CsvSeeder
{

    public function __construct()
    {
        $this->table = 'provinsi';
        $this->filename = base_path().'/database/seeds/csv/provinsi.csv';
        $this->offset_rows = 1;
        $this->mapping = [
            0 => 'id_provinsi',
            1 => 'nama',
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
