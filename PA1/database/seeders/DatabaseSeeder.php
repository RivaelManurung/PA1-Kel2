<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $petaniRole = Role::create(['name' => 'petani']);

        // Create admin user
        User::create([
            'nama' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'nomorhp' => '0882015124284',
            'alamat' => 'Jln Kampung Kubur',
            'password' => bcrypt('admin123'),
            'role_id' => $adminRole->id,
        ]);

        // ... create more users if needed

        $this->call(EdukasiSeeder::class);
        $this->call(ProyekTaniSeeder::class);
        $this->call(AgendaSeeder::class);
        $this->call(BarangSeeder::class);
    }
}



