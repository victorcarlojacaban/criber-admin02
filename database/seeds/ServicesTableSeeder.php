<?php

use Carbon\Carbon as Carbon;
use Database\DisableForeignKeys;
use Database\TruncateTable;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->truncate();

        $services = [
            [
                'name'  	 => 'House Cleaning',
                'icon_name'  => 'short-broom-icon.png',
                'type'       => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'  	 => 'Air Conditioned',
                'icon_name'  => 'air-conditioner.png',
                'type'       => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'  	 => 'WIFI',
                'icon_name'  => 'wifi.png',
                'type'       => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'  	 => 'House Repair & Maintenance',
                'icon_name'  => 'hammer-shape.png',
                'type'       => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'  	 => 'Swimming Pool',
                'icon_name'  => 'swimming-pool.png',
                'type'       => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'  	 => 'GYM',
                'icon_name'  => 'dumbbell.png',
                'type'       => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'  	 => '24 Hours Security',
                'icon_name'  => 'guard.png',
                'type'       => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'  	 => 'Location Transfer',
                'icon_name'  => 'map.png',
                'type'       => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'  	 => 'Laundry',
                'icon_name'  => 'washin-machine.png',
                'type'       => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'  	 => 'House Moving',
                'icon_name'  => 'transport.png',
                'type'       => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
            	'name'  	 => 'Community or Social Activities',
                'icon_name'  => 'football.png',
                'type'       => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'  	 => 'Online Parcel Receiving when your not home',
                'icon_name'  => 'parcel.png',
                'type'       => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'  	 => 'Exclusive Discounted Classes',
                'icon_name'  => 'tag.png',
                'type'       => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('services')->insert($services);
    }
}
