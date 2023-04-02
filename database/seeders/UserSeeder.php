<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'SuperUser',
            'username' => 'superuser',
            'id_role' => 1,
            'id_subsatker' => 1,
            'email' => 'superuser@example.com',
            'password' => bcrypt('123456789'),
        ]);
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'id_role' => 2,
            'id_subsatker' => 1,
            'email' => 'Admin@example.com',
            'password' => bcrypt('123456789'),
        ]);
        User::create([
            'name' => 'AdminMaintenance',
            'username' => 'maintenance',
            'id_role' => 3,
            'id_subsatker' => 1,
            'email' => 'Maintenance@example.com',
            'password' => bcrypt('123456789'),
        ]);
        User::create([
            'name' => 'AdminInspeksi',
            'username' => 'inspeksi',
            'id_role' => 4,
            'id_subsatker' => 1,
            'email' => 'inspeksi@example.com',
            'password' => bcrypt('123456789'),
        ]);
    }
}
