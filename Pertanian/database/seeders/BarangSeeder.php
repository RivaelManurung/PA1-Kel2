<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 10; $i++) {
            DB::table('barang')->insert([
                'nama' => $faker->sentence,
                'jumlah' => $faker->numberBetween(0, 100),
                'gambar' => $faker->imageUrl(),
            ]);
        }
    }
}
