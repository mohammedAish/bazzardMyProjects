<?php

namespace Database\Seeders;

use App\Models\RoleUser;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*  DB::table('role_user')->insert([
            'role_id' => '1',
            'user_id' => '1',
           
        ]); */

        RoleUser::create([
            'role_id' => '1',
            'user_id' => '1',
        ]);   
     }
}