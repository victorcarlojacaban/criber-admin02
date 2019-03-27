<?php

use Carbon\Carbon as Carbon;
use Database\DisableForeignKeys;
use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('features')->truncate();

        $features = [
            [
            	'name'        => '1 double bed',
                'icon_name'   => 'bed.png',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
             [
            	'name'        => '1 shared bathroom',
                'icon_name'   => 'shower.png',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
        ];

        DB::table('features')->insert($features);
    }
}
