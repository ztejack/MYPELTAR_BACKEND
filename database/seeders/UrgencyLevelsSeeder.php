<?php

namespace Database\Seeders;

use App\Models\UrgencyLevel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UrgencyLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['status_name' => 'Low', 'priority_level' => 1, 'description' => 'Non-critical, low urgency'],
            ['status_name' => 'Medium', 'priority_level' => 2, 'description' => 'Moderate urgency, requires attention'],
            ['status_name' => 'High', 'priority_level' => 3, 'description' => 'High urgency, needs immediate action'],
            ['status_name' => 'Critical', 'priority_level' => 4, 'description' => 'Critical situation, act immediately'],
        ];
        foreach ($data as $item) {
            UrgencyLevel::create($item);
        }
    }
}
