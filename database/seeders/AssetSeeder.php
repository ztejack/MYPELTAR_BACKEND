<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $asset = Asset::create([
            'serialnumber' => 'TS-002TGB',
            'name' => 'Thermal Scanner-Hikvision',
            'brand' => 'Hikvision',
            'model' => 'DS-2TP31B-3AUF',
            'specifications' => '160x120 thermal res, ±0.5°C accuracy',
            'description' => 'Industrial-use thermal scanner for inspections',
            'id_location' => 15,
            'id_status' => 1,
            'image' => 'public/images/example.png',
        ]);
        $category = Category::find(10);
        $asset->category()->attach($category, ['created_at' => now(), 'updated_at' => now()]);
    }
}
