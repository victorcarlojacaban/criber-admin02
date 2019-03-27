<?php

use Carbon\Carbon as Carbon;
use Database\DisableForeignKeys;
use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->truncate();

        $rooms = [
            [
            	'location_id' => 1,
                'name'  	  => 'Rooms To - 1(25m2)',
                'price' 	  => 'USD 6.35 million',
                'features'    => '["1","2"]',
                'image_name'  => 'parkview.jpg',
                'status' 	  => 1,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
            	'location_id' => 1,
                'name'  	  => '2nd Room(16m2)',
                'price' 	  => 'Rp 5,800,000',
                'features'    => '["1","2"]',
                'image_name'  => '',
                'status' 	  => 1,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
            	'location_id' => 1,
                'name'  	  => '3nd Room(10m2)',
                'price' 	  => 'Rp 5,800,000',
                'features'    => '["1","2"]',
                'image_name'  => '',
                'status' 	  => 1,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
        ];

        DB::table('rooms')->insert($rooms);
    }
}
