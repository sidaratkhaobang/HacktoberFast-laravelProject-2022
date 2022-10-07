<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportProvinces extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ud:import_provinces';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Provinces and all data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->importProvinces();

        return 0;
    }


    private function importProvinces()
    {
        $handle = fopen(storage_path('init/provinces.csv'), "r");

        $header = true;
        while ($col = fgetcsv($handle, 5000, ",")) {
            if ($header) {
                $header = false;
                continue;
            }
            if (sizeof($col) < 5) {
                continue;
            }
            $id = trim($col[0]);
            $name_th = trim($col[2]);
            $name_en = trim($col[3]);

            if (empty($id) || empty($name_th)) {
                continue;
            }

            $exists = DB::table('provinces')->where('id', $id)->exists();
            if (!$exists) {
                DB::table('provinces')->insert([
                    'id' => $id,
                    'name_th' => $name_th,
                    'name_en' => $name_en,
                ]);
            }
        }

        // map ref_id

        $handle = fopen(storage_path('olddb/DBProvince.csv'), "r");

        $header = true;
        while ($col = fgetcsv($handle, 5000, ",")) {
            if ($header) {
                $header = false;
                continue;
            }
            if (sizeof($col) < 6) {
                continue;
            }
            $id = trim($col[0]);
            $name = trim($col[2]);

            if (empty($name)) {
                continue;
            }

            $exists = DB::table('provinces')->where('name_th', $name)->exists();
            if ($exists) {
                DB::table('provinces')->where('name_th', $name)->update([
                    'ref_id' => $id,
                ]);
            }
        }
    }
}
