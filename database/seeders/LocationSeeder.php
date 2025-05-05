<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create([
            'unit' => 'Gedung Terpadu LT1'
        ]);
        Location::create([
            'unit' => 'Gedung Terpadu LT2'
        ]);
        Location::create([
            'unit' => 'Gedung Terpadu LT3'
        ]);
        Location::create([
            'unit' => 'Gedung Terpadu LT6'
        ]);
        Location::create([
            'unit' => 'Gedung Terpadu LT7'
        ]);
        Location::create([
            'unit' => 'Gedung Terpadu LT8'
        ]);
        Location::create([
            'unit' => 'Pompa'
        ]);
        Location::create([
            'unit' => 'RCD1'
        ]);
        Location::create([
            'unit' => 'RCD2'
        ]);
        Location::create([
            'unit' => 'RCD1'
        ]);
        Location::create([
            'unit' => 'PCC LT1'
        ]);
        Location::create([
            'unit' => 'PCC LT2'
        ]);
        Location::create([
            'unit' => 'Jetty 1'
        ]);
        Location::create([
            'unit' => 'Jetty 2'
        ]);
        Location::create([
            'unit' => 'Gedung K3'
        ]);
        Location::create([
            'unit' => 'PLTU'
        ]);
        Location::create([
            'unit' => 'Watrik'
        ]);
    }
}
