<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 20; $i++) {
            DB::table('users')->insert([
                'nama' => $faker->name,
                'alamat' => $faker->address,
                'username' => $faker->userName,
                'nomorhp' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('password'),
                'level' => 'user'
            ]);
        }
    }
}
