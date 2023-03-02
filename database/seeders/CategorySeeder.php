<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::class([
            'kategori' => 'Block',
            'id_subsatker' => 3
        ]);
        Category::class([
            'kategori' => 'Jaringan',
            'id_subsatker' => 1
        ]);
        Category::class([
            'kategori' => 'PowerSupply',
            'id_subsatker' => 2
        ]);
    }
}
