<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProyekTaniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 10; $i++) {
            DB::table('proyek_tani')->insert([
                'judul' => $faker->sentence(),
                'gambar' => $faker->imageUrl(),
                'deskripsi' => $faker->paragraph(),
            ]);
        }
    }
}
