<?php

namespace Database\Seeders;

use App\Models\Divisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Divisi::create([
            'divisi' => 'IT',
            'id_satker' => 1,
        ]);
        Divisi::create([
            'divisi' => 'Perawatan Listrik',
            'id_satker' => 1,
        ]);
        Divisi::create([
            'divisi' => 'Mekanik',
            'id_satker' => 1,
        ]);
    }
}
