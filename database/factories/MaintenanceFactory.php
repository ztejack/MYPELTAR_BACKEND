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
            'id_user' => 3,
            'jenis' => fake()->name(),
            'deskripsi' => $this->faker->sentence(mt_rand(2, 5)),
            'fotobefore' => $this->faker->sentence(mt_rand(2, 5)),
            'fotoafter' => $this->faker->sentence(mt_rand(2, 5)),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
