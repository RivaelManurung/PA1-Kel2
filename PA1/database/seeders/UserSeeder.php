<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Create admin user
        User::create([
            'nama' => 'Admin',
            'alamat' => 'Admin Address',
            'username' => 'admin',
            'nomorhp' => '123456789',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role_id' => $adminRole->id,
        ]);

        // Create regular user
        User::create([
            'nama' => 'User',
            'alamat' => 'User Address',
            'username' => 'user',
            'nomorhp' => '987654321',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
            'role_id' => $userRole->id,
        ]);

        // ... create more users if needed
    }
}

