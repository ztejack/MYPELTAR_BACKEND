<?php

namespace Database\Seeders;

use App\Models\TypeMaintenance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeMaintenanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeMaintenance::create([
            'type' => 'Inspeksi'
        ]);
        TypeMaintenance::create([
            'type' => 'Breakdown'
        ]);
    }
}
