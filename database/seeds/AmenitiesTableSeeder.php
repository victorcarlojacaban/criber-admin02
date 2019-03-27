<?php

use Carbon\Carbon as Carbon;
use Database\DisableForeignKeys;
use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AmenitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('amenities')->truncate();

        $amenities = [
            [
                'name'  	 => 'The Gym',
                'icon_name'  => 'dumbbell-blue.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'  	 => 'Swimming Pool',
                'icon_name'  => 'swimming-pool-blue.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'  	 => 'Tennis',
                'icon_name'  => 'racket.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'  	 => 'Playground',
                'icon_name'  => 'sliding.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'  	 => 'Wifi',
                'icon_name'  => 'wifi-blue.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'  	 => 'Air Conditioning',
                'icon_name'  => 'air-conditioner-blue.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'  	 => 'Water Heater',
                'icon_name'  => 'water-heater.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'  	 => 'Stove',
                'icon_name'  => 'stove.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'  	 => 'Microwave',
                'icon_name'  => 'microwave.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'  	 => 'Refrigerator',
                'icon_name'  => 'refrigerator.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
             [
                'name'  	 => 'Oven',
                'icon_name'  => 'oven.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('amenities')->insert($amenities);
    }
}
