<?php

namespace Database\Factories;

use App\Models\Maintenance;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\p_update>
 */
class PMaintenanceUpdateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'id_asset' => mt_rand(1, 5),
            'id_user' => User::pluck('id')->random(),
            'id_maintenance' => Maintenance::factory(),
            'id_status' => Status::where('statustype', 'MTNC')->pluck('id')->random(),
            'deskripsi' => $this->faker->sentence(mt_rand(1, 4)),
            'image' => 'public/images/News/example.png'
        ];
    }
}
