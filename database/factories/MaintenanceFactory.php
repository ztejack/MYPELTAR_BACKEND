<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\maintenance>
 */
class MaintenanceFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_user_inspeksi' => 3,
            'id_asset' => mt_rand(1, 5),
            'id_type' => mt_rand(1, 2),
            'deskripsi' => $this->faker->sentence(mt_rand(2, 10)),
            'imagebefore' => $this->faker->sentence(mt_rand(2, 5)),
            'imageafter' => $this->faker->sentence(mt_rand(2, 5)),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
