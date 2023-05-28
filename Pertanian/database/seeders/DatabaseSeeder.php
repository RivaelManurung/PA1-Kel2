<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $data = array(
            [
                'nama' => 'admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'nomorhp' => '0882015124284',
                'alamat' => 'Jln Kampung Kubur',
                'password' => Hash::make('admin123'),
                'level' => 'admin'
            ]
        );
        foreach($data AS $d){
            User::create([
                'nama' => $d['nama'],
                'username' => $d['username'],
                'email' => $d['email'],
                'nomorhp' => $d['nomorhp'],
                'alamat' => $d['alamat'],
                'password' => $d['password'],
                'level' => $d['level']
            ]);
        }
        $this->call(EdukasiSeeder::class);
        $this->call(ProyekTaniSeeder::class);
        $this->call(AgendaSeeder::class);
        $this->call(BarangSeeder::class);


    }


}
