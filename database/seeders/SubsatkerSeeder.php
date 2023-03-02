<?php

namespace Database\Seeders;

use App\Models\Subsatker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubsatkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subsatker::create([
            'subsatker' => 'IT',
            'id_satker' => 1,
        ]);
        Subsatker::create([
            'subsatker' => 'Perawatan Listrik',
            'id_satker' => 1,
        ]);
        Subsatker::create([
            'subsatker' => 'Mekanik',
            'id_satker' => 1,
        ]);
    }
}
