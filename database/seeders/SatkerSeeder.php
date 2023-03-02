<?php

namespace Database\Seeders;

use App\Models\Satker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SatkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Satker::create([
            'satker' => 'Perawatan',
        ]);
    }
}
