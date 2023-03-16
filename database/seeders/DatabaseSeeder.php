<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\Location;
use App\Models\Maintenance;
use App\Models\PUpdate;
use App\Models\Satker;
use App\Models\Subsatker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            RoleSeeder::class,
            LocationSeeder::class,
            SatkerSeeder::class,
            SubsatkerSeeder::class,
            UserSeeder::class,
            StatusAssetsSeeder::class,
        ]);
        Satker::factory(5)->create();
        Subsatker::factory(5)->create();
        // Category::factory(5)->create();
        Location::factory(5)->create();
        Asset::factory(5)->create();
        Maintenance::factory(5)->create();
        // PCategory::factory(5)->create();
        PUpdate::factory(5)->create();
    }
}
