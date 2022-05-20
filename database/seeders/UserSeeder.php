<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          /* DB::table('users')->insert([
            'user_name' => 'superadmins',
            'email' => 'superadmins@gmail.com',
            'password' =>  Hash::make('123123123'),
            'type' => 'superadmin',
           
        ]); */

        User::create([
            'user_name' => 'bazaard',
            'email' => 'bazaard@gmail.com',
            'password' => Hash::make('12345600'),
            'type' => 'superadmin',
        ]);
    }
}
