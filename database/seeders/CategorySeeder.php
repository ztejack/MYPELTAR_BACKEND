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
        Category::create([
            'category' => 'Block',
            'id_divisi' => 3
        ]);
        Category::create([
            'category' => 'Jaringan',
            'id_divisi' => 1
        ]);
        Category::create([
            'category' => 'PC',
            'id_divisi' => 1
        ]);
        Category::create([
            'category' => 'Laptop',
            'id_divisi' => 1
        ]);
        Category::create([
            'category' => 'Printer',
            'id_divisi' => 1
        ]);
        Category::create([
            'category' => 'CCTV',
            'id_divisi' => 1
        ]);
        Category::create([
            'category' => 'Proyektor',
            'id_divisi' => 1
        ]);
        Category::create([
            'category' => 'Power Tool',
            'id_divisi' => 3
        ]);
        Category::create([
            'category' => 'Power Tool',
            'id_divisi' => 1
        ]);
        Category::create([
            'category' => 'Power Tool',
            'id_divisi' => 2
        ]);
        Category::create([
            'category' => 'Filter',
            'id_divisi' => 3
        ]);
    }
}
