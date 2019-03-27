<?php

use Carbon\Carbon as Carbon;
use Database\DisableForeignKeys;
use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('locations')->truncate();

        $locations = [
            [
                'name'              => 'Jalan Klang Lama',
                'main_image'        => 'parkview.jpg',
                'title'             => 'Room in the 2nd Floor 2 BR Unit in Puri Park View',
                'complete_address'  => 'PS-4, Taman Evergreen, Jalan Klang Lama, Batu 4, 58100 Kuala Lumpur, Federal Territory of Kuala Lumpur, Malaysia',
                'overview'    	    => 'For those who actually experienced renting rooms, they will pretty much agree that it’s simply a place for them to clean themselves, sleep and spend most of their time in their respective rooms. At Criber, we want our members to communicate and interact with one another. To achieve this, we will organise events on a weekly, monthly, quarterly and yearly activities so that our members are not foreign with one another regardless of the location. In other words, members of Criber will have the opportunity to interact with other members located in other parts of Klang Valley.',
                'building_amenities' => '["1","2","3","4"]',
                'unit_amenities'     => '["5","6","7","8","9","10","11"]',
                'payment_of_rent'    => 'According to the date of entry ',
                'security_deposit'   => '1 Month Rent',
                'address_map_src'    => 'https://maps.google.com/maps?q=TBM%20-%20Jalan%20Klang%20Lama%20(Tan%20Boon%20Ming%20Sdn.%20Bhd.)&t=&z=13&ie=UTF8&iwloc=&output=embed',
                'regulations'        => '<p>Do not bring pets into the unit.</p>
                    <p>Do not place personal property that disturbs the comfort in the corridor and in the shared area.</p>
                    <p>It is prohibited to carry or store prohibited items, drugs, firearms, etc.</p>
                    <p>No somking inside the unit.</p>
                    <p>Guests are prohibited from staying more than 2x24 hours.</p>
                    <p>Use electricity, water, air conditioning as needed, excessive use of AC and electricity is out of the
                    <p> Ordinary, resulting in high electricity bills that will be charged to tenants and paid by tenants on a pro-rate basis.</p>
                    <p>Clean and return the eating and drinking equipment in the kitche after use.</p>
                    <p>Dispose of each garbage to the landfill provided on each floor (near he elevator).</p>',
                'created_at'         => Carbon::now(),
                'updated_at'         => Carbon::now(),
            ],
        ];

        DB::table('locations')->insert($locations);
    }
}
