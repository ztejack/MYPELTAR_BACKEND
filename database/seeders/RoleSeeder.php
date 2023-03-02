<?php

namespace Database\Seeders;

use App\Models\Role;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'role' => 'SuperUser',
        ]);
        Role::create([
            'role' => 'Inspektor',
        ]);
        Role::create([
            'role' => 'Inspeksi',
        ]);
    }
}
