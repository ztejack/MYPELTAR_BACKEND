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
            'statustype' => 'ASST',
            'status' => 'Dalam Perbaikan',
        ]);

        Status::create([
            'statustype' => 'ASST',
            'status' => 'Baik'
        ]);

        Status::create([
            'statustype' => 'ASST',
            'status' => 'Rusak',
        ]);

        Status::create([
            'statustype' => 'MTNC',
            'status' => 'Pending',
        ]);
        Status::create([
            'statustype' => 'MTNC',
            'status' => 'Dalam Perbaikan',
        ]);
        Status::create([
            'statustype' => 'MTNC',
            'status' => 'Selesai',
        ]);
    }
}
