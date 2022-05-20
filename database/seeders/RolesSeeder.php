<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  
    public function run()
    {
          DB::table('roles')->insert([
            'name' => 'super_admins',
            'abilities' => json_encode([ "users.viewAny","users.view","users.create","users.update","users.delete","roles.viewAny","roles.view","roles.create","roles.update","roles.delete","products.viewAny","products.view","products.create","products.update","products.delete","categories.viewAny","categories.view","categories.create","categories.update","categories.delete","currently_sells.viewAny","currently_sells.view","currently_sells.create","currently_sells.update","currently_sells.delete"]),
        ]);
            DB::table('roles')->insert([
            'name' => 'admins',
            'abilities' => json_encode([ "users.viewAny","users.view","users.create","users.update","users.delete","roles.viewAny","roles.view","roles.create","roles.update","roles.delete","products.viewAny","products.view","products.create","products.update","products.delete","categories.viewAny","categories.view","categories.create","categories.update","categories.delete","currently_sells.viewAny","currently_sells.view","currently_sells.create","currently_sells.update","currently_sells.delete"]),
            
        ]); 
              DB::table('roles')->insert([
            'name' => 'merchants',
            'abilities' => json_encode(["users.view","users.create","users.update","users.delete","products.viewAny","products.view","products.create","products.update","products.delete","categories.viewAny","categories.view","categories.create","categories.update","categories.delete"]),
            
        ]); 
                DB::table('roles')->insert([
            'name' => 'users',
            'abilities' => json_encode(["products.viewAny","products.view","products.create","products.update","categories.view"]),
        ]); 

    }
    
}
