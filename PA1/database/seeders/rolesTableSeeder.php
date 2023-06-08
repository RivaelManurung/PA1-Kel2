<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        // Hapus data roles jika ada
        Role::truncate();

        // Buat data roles
        $roles = [
            ['name' => 'Admin'],
            ['name' => 'User'],
        ];

        // Masukkan data roles ke dalam tabel
        Role::insert($roles);
    }
}
