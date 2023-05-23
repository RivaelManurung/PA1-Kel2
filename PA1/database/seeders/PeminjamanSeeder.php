<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 10; $i++) {
            DB::table('peminjaman')->insert([
                'nama' => $faker->name,
                'alamat' => $faker->address,
                'namaalat' => $faker->word,
                'jumlah' => $faker->numberBetween(1, 10),
                'tanggal_peminjaman' => $faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d H:i:s'),
                'tanggal_pemulangan' => $faker->dateTimeBetween('now', '+1 month')->format('Y-m-d H:i:s'),
                'status' => $faker->randomElement(['dipinjam', 'dikembalikan']),
                'notif' => $faker->boolean,
                'pemberitahuan' => $faker->paragraph,
                'user_id' => DB::table('users')->inRandomOrder()->value('id')
            ]);
        }
    }
}
