<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Superadmin
        $superadmin = User::firstOrCreate([
            'name' => 'Superadmin',
            'email' => 'superadmin@umkm.com',
        ], [
            'password' => Hash::make('superadmin@umkm.com'), // Ganti password sesuai kebutuhan
        ]);
        $superadmin->assignRole('Superadmin');
    }
}
