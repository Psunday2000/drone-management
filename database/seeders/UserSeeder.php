<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('en_NG');

        // Create Administrator
        DB::table('users')->insert([
            'name'  => 'Administrator',
            'email' => 'psunday2000@gmail.com',
            'password' => Hash::make('nWachi.#me33@."/'),
            'role_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Create 5 controllers
        for ($i=0; $i <5; $i++) { 
            DB::table('users')->insert([
                'name'  => $faker->name,
                'email' => $faker->unique()->userName().'@gmail.com',
                'password' => Hash::make('conPass2.98@/'),
                'role_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
