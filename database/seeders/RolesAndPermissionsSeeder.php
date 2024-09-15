<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat role
    $superadmin = Role::create(['name' => 'superadmin']);
    $admin = Role::create(['name' => 'admin']);

    // Buat permission
    $manageUsers = Permission::create(['name' => 'manage users']);
    $manageUMKM = Permission::create(['name' => 'manage umkm']);

    // Assign permission ke role
    $superadmin->givePermissionTo($manageUsers);
    $superadmin->givePermissionTo($manageUMKM);

    $admin->givePermissionTo($manageUMKM);
    }
}
