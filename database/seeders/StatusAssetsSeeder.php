<?php

namespace Database\Seeders;

use App\Models\StatusAssets;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusAssetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusAssets::create([
            // 'statuscode' => 'ST1',
            'status' => 'Dalam Perbaikan',
        ]);

        StatusAssets::create([
            // 'statuscode' => 'ST2',
            'status' => 'Baik'
        ]);

        StatusAssets::create([
            // 'statuscode' => 'ST3',
            'status' => 'Rusak',
        ]);

        StatusAssets::create([
            // 'statuscode' => 'ST4',
            'status' => 'Under Maintenance',
        ]);
    }
}
