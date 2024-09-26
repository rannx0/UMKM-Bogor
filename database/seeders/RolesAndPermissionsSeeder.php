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
    public function run()
    {
        // Daftar semua permissions yang ada
        $permissions = [
            'manage-admin',
            'view-permission',
            'manage-users',
            'personal-data',
            'manage-umkm',
            'manage-configurations',
            'view-reports',
            'manage-roles and permissions',
            'view-financial data',
            'manage-notifications',
            'manage-categories',
            'manage-locations',
            'view-locations',
            'view-personal-data',
            'update-personal-data',
            'manage-own-umkm',
            'view-umkm',
            'view-financial-data',
            'view-configurations',
            
        ];

        // Membuat semua permissions ke database
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Membuat roles dan memberikan permissions yang sesuai

        // Superadmin: Akses semua permissions
        $superadmin = Role::firstOrCreate(['name' => 'Superadmin']);
        $superadmin->givePermissionTo(Permission::all());

        // Manager
        $manager = Role::firstOrCreate(['name' => 'Manager']);
        $manager->givePermissionTo([
            'manage-users',
            'personal-data',
            'manage-umkm',
            'manage-configurations',
            'view-reports',
            'manage-roles and permissions'
        ]);

        // Administrator
        $administrator = Role::firstOrCreate(['name' => 'Administrator']);
        $administrator->givePermissionTo([
            'manage-users',
            'view-financial data',
            'view-umkm',
            'manage-notifications',
            'view-configurations'
        ]);

        // UMKM Management
        $umkmManagement = Role::firstOrCreate(['name' => 'UMKM Management']);
        $umkmManagement->givePermissionTo([
            'manage-umkm',
            'view-financial data',
            'manage-categories',
            'manage-locations',
            'view-locations'
        ]);

        // Configurations Management
        $configurationsManagement = Role::firstOrCreate(['name' => 'Configurations Management']);
        $configurationsManagement->givePermissionTo([
            'manage-configurations',
            'view-reports'
        ]);

        // CEO
        $ceo = Role::firstOrCreate(['name' => 'CEO']);
        $ceo->givePermissionTo([
            'manage-users',
            'personal-data',
            'manage-umkm',
            'view-financial data',
            'manage-roles and permissions',
            'view-reports',
            'view-umkm'
        ]);

        // User
        $user = Role::firstOrCreate(['name' => 'User']);
        $user->givePermissionTo([
            'view-personal-data',
            'update-personal-data',
            'manage-own-umkm',
            'view-financial-data'
        ]);
    }

}
