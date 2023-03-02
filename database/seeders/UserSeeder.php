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
            'email' => 'example0@example.com',
            'id_role' => 1,
            'id_subsatker' => 1,
            'email' => 'superuser@example.com',
            'password' => bcrypt('123456789'),
        ]);
        User::create([
            'name' => 'AdminInspeksi',
            'username' => 'inspeksi',
            'email' => 'example1@example.com',
            'id_role' => 2,
            'id_subsatker' => 2,
            'email' => 'inspeksi@example.com',
            'password' => bcrypt('123456789'),
        ]);
        User::create([
            'name' => 'AdminInspektor',
            'username' => 'inspektor',
            'email' => 'example2@example.com',
            'id_role' => 3,
            'id_subsatker' => 3,
            'email' => 'inspektor@example.com',
            'password' => bcrypt('123456789'),
        ]);
    }
}
