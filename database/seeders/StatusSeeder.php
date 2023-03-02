<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'statuscode' => 'ST1',
            'status' => 'Dalam Perbaikan',
        ]);

        Status::create([
            'statuscode' => 'ST2',
            'status' => 'Baik'
        ]);

        Status::create([
            'statuscode' => 'ST3',
            'status' => 'Rusak',
        ]);

        Status::create([
            'statuscode' => 'ST4',
            'status' => 'Under Maintenance',
        ]);
    }
}
