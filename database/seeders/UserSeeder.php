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
            'name' => 'SuperUser',
            'username' => 'superuser',
            'id_divisi' => 1,
            'email' => 'axtomy9@gmail.com',
            'password' => bcrypt('mypeltar@user'),
        ]);
        $user->save();
        $role = Role::findByName('SuperAdmin');
        $user->assignRole($role);

        $user = User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'id_divisi' => 1,
            'email' => 'axtomy99@gmail.com',
            'password' => bcrypt('mypeltar@user'),
        ]);
        $role = Role::findByName('Admin');
        $user->assignRole($role);

        $user = User::create([
            'name' => 'UserMaintenance',
            'username' => 'maintenance',
            'id_divisi' => 1,
            'email' => 'maintenance@example.com',
            'password' => bcrypt('mypeltar@user'),
        ]);
        $role = Role::findByName('Maintenance');
        $user->assignRole($role);

        $user = User::create([
            'name' => 'UserInspeksi',
            'username' => 'inspeksi',
            'id_divisi' => 1,
            'email' => 'inspeksi@example.com',
            'password' => bcrypt('mypeltar@user'),
        ]);
        $role = Role::findByName('Inspeksi');
        $user->assignRole($role);

        $user = User::create([
            'name' => 'UserTest',
            'username' => 'TestUser',
            'id_divisi' => 1,
            'email' => 'axzxx99@gmail.com',
            'password' => bcrypt('mypeltar@user'),
        ]);
    }
}
