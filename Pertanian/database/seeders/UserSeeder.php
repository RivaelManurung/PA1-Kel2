<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'nomorhp' => '0882015124284',
                'alamat' => 'Jln SM Raja Lintas Sumatera',
                'password' => Hash::make('admin123'),
                'level' => 'admin'


            ]
        );
        foreach($data AS $d){
            User::create([
                'username' => $d['username'],
                'email' => $d['email'],
                'nomorhp' => $d['nomorhp'],
                'alamat' => $d['alamat'],
                'password' => $d['password'],
                'level' => $d['level']
            ]);
        }
    }

}