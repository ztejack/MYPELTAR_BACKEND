<?php

namespace Database\Seeders;

// use App\Models\Role;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Role::create([
        //     'role' => 'SuperUser',
        // ]);
        // Role::create([
        //     'role' => 'Admin',
        // ]);
        // Role::create([
        //     'role' => 'Maintenance',
        // ]);
        // Role::create([
        //     'role' => 'Inspeksi',
        // ]);

        // USERS
        Permission::create(['name' => 'create-users']);
        Permission::create(['name' => 'edit-users']);

        Permission::create(['name' => 'delete-users']);

        // MAINTENANCE
        Permission::create(['name' => 'create-maintenance']);

        Permission::create(['name' => 'update-maintenance']);

        //SATKER
        Permission::create(['name' => 'create-satker']);
        Permission::create(['name' => 'update-satker']);

        //SUBSATKER
        Permission::create(['name' => 'create-subsatker']);
        Permission::create(['name' => 'update-subsatker']);

        // ROLES
        Permission::create(['name' => 'attemp-role']);

        //ASSET
        Permission::create(['name' => 'crud-assets']);



        $superadminRole = Role::create(['name' => 'SuperAdmin']);
        $adminRole = Role::create(['name' => 'Admin']);
        $inspeksiRole = Role::create(['name' => 'Inspeksi']);
        $maintenanceRole = Role::create(['name' => 'Maintenance']);

        $superadminRole->givePermissionTo([
            'create-users',
            'edit-users',
            'delete-users',
            'create-maintenance',
            'update-maintenance',
            'create-satker',
            'update-satker',
            'create-subsatker',
            'update-subsatker',
            // 'crud-assets',
            'attemp-role'
        ]);

        $adminRole->givePermissionTo([
            'edit-users',
            'create-maintenance',
            'update-maintenance',
            'create-satker',
            'update-satker',
            'create-subsatker',
            'update-subsatker',
            'crud-assets',

        ]);

        $inspeksiRole->givePermissionTo([
            'create-maintenance',
        ]);

        $maintenanceRole->givePermissionTo([
            'update-maintenance',
        ]);
    }
}
