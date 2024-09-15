<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $superadminRole = Role::where('name', 'superadmin')->first();
        $adminRole = Role::where('name', 'admin')->first();
    
        User::create([
            'name' => 'Superadmin',
            'email' => 'superadmin@umkm.com',
            'password' => bcrypt('superadmin@umkm.com'),
        ])->assignRole($superadminRole);
    
        User::create([
            'name' => 'Admin',
            'email' => 'admin@umkm.com',
            'password' => bcrypt('admin@umkm.com'),
        ])->assignRole($adminRole);
    }
}
