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
        // USERS
        Permission::create(['name' => 'store-users']);
        Permission::create(['name' => 'update-users']);
        Permission::create(['name' => 'delete-users']);
        Permission::create(['name' => 'getall-users']);
        Permission::create(['name' => 'search-users']);
        Permission::create(['name' => 'show-users']);

        // INSPEKSI
        Permission::create(['name' => 'store-inspeksi']);
        Permission::create(['name' => 'update-inspeksi']);

        // MAINTENANCE
        Permission::create(['name' => 'create-maintenance']);
        Permission::create(['name' => 'delete-maintenance']);

        //SATKER
        Permission::create(['name' => 'store-satker']);
        Permission::create(['name' => 'update-satker']);
        Permission::create(['name' => 'delete-satker']);

        //SUBSATKER
        Permission::create(['name' => 'store-subsatker']);
        Permission::create(['name' => 'update-subsatker']);
        Permission::create(['name' => 'delete-subsatker']);

        // ROLES
        // Permission::create(['name' => 'assign-role']);
        // Permission::create(['name' => 'remove-role']);

        //ASSET
        Permission::create(['name' => 'store-assets']);
        Permission::create(['name' => 'update-assets']);
        Permission::create(['name' => 'delete-assets']);

        // BANNER
        Permission::create(['name' => 'store-news']);
        Permission::create(['name' => 'update-news']);
        Permission::create(['name' => 'delete-news']);

        // CATEGORY
        Permission::create(['name' => 'store-category']);
        Permission::create(['name' => 'update-category']);
        Permission::create(['name' => 'delete-category']);

        // LOCATION
        Permission::create(['name' => 'store-location']);
        Permission::create(['name' => 'update-location']);
        Permission::create(['name' => 'delete-location']);

        // STATUSA
        Permission::create(['name' => 'store-status']);
        Permission::create(['name' => 'update-status']);
        Permission::create(['name' => 'delete-status']);

        // ROLE
        Permission::create(['name' => 'management-role']);

        $superadminRole = Role::create(['name' => 'SuperAdmin']);
        $adminRole = Role::create(['name' => 'Admin']);
        $inspeksiRole = Role::create(['name' => 'Inspeksi']);
        $maintenanceRole = Role::create(['name' => 'Maintenance']);

        $superadminRole->givePermissionTo([
            'store-users',
            'update-users',
            'delete-users',
            'getall-users',
            'search-users',
            'show-users',

            'store-assets',
            'update-assets',
            'delete-assets',

            'store-news',
            'update-news',
            'delete-news',

            'store-inspeksi',
            'update-inspeksi',
            'delete-maintenance',

            'store-location',
            'update-location',
            'delete-location',

            'store-satker',
            'update-satker',
            'delete-satker',

            'store-subsatker',
            'update-subsatker',
            'delete-subsatker',

            'store-category',
            'update-category',
            'delete-category',

            'store-status',
            'update-status',
            'delete-status',

            'management-role'
        ]);

        $adminRole->givePermissionTo([
            'store-users',
            'update-users',
            'getall-users',
            'search-users',
            'show-users',

            'store-assets',
            'update-assets',
            'delete-assets',

            'store-news',
            'update-news',
            'delete-news',

            'store-location',
            'update-location',
            'delete-location',

            'store-inspeksi',
            'update-inspeksi',
            'delete-maintenance',

            'store-satker',
            'update-satker',
            'delete-satker',

            'store-subsatker',
            'update-subsatker',
            'delete-subsatker',

            'store-category',
            'update-category',
            'delete-category',

            'store-status',
            'update-status',
            'delete-status',
            'management-role'
        ]);

        $inspeksiRole->givePermissionTo([
            'store-inspeksi',
            'update-inspeksi',
            'delete-maintenance',
        ]);

        $maintenanceRole->givePermissionTo([
            // 'store-inspeksi',
            // 'delete-maintenance',
            'update-inspeksi',
        ]);
    }
}
