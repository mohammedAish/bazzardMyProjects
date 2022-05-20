<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert(
            ['city_id' => '1',
            'city_name' =>  'Nablus',
            ]);
        DB::table('cities')->insert(
            ['city_id' => '5',
            'city_name' =>  'Ramallah and Al-Bireh',
            ]);
        DB::table('cities')->insert(
            ['city_id' => '25',
            'city_name' =>  'Al Jalil',
            ]);
        DB::table('cities')->insert(
            ['city_id' => '26',
            'city_name' =>  'Beer Al Sabe',
            ]);
        DB::table('cities')->insert(
            ['city_id' => '27',
            'city_name' =>  'Yafa',
            ]);
        DB::table('cities')->insert(
            ['city_id' => '29',
            'city_name' =>  'Al Ramla'
            ]);
        DB::table('cities')->insert(
            ['city_id' => '44',
            'city_name' =>  'Dawahe Al-Quds',
            ]);
    }
}
