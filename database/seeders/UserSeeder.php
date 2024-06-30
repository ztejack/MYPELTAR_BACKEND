<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Rfc4122\UuidV4;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            // 'uuid' => UuidV4::uuid4()->getHex(),
            'name' => 'SuperUser',
            'username' => 'superuser',
            'id_subsatker' => 1,
            'email' => 'superuser@example.com',
            'password' => bcrypt('123456789'),
        ]);
        $superAdminRole = Role::findByName('SuperAdmin');
        $user->assignRole($superAdminRole);

        $user = User::create([
            // 'uuid' => UuidV4::uuid4()->getHex(),
            'name' => 'Admin',
            'username' => 'admin',
            'id_subsatker' => 1,
            'email' => 'Admin@example.com',
            'password' => bcrypt('123456789'),
        ]);
        $superAdminRole = Role::findByName('Admin');
        $user->assignRole($superAdminRole);

        $user = User::create([
            // 'uuid' => UuidV4::uuid4()->getHex(),
            'name' => 'AdminMaintenance',
            'username' => 'maintenance',
            'id_subsatker' => 1,
            'email' => 'Maintenance@example.com',
            'password' => bcrypt('123456789'),
        ]);
        $superAdminRole = Role::findByName('Maintenance');
        $user->assignRole($superAdminRole);

        $user = User::create([
            // 'uuid' => UuidV4::uuid4()->getHex(),
            'name' => 'AdminInspeksi',
            'username' => 'inspeksi',
            'id_subsatker' => 1,
            'email' => 'inspeksi@example.com',
            'password' => bcrypt('123456789'),
        ]);
        $superAdminRole = Role::findByName('Inspeksi');
        $user->assignRole($superAdminRole);
    }
}
