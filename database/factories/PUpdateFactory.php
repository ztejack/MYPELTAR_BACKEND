<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\p_update>
 */
class PUpdateFactory extends Factory
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
            'id_user' => mt_rand(1, 3),
            'id_maintenance' => mt_rand(1, 50),
            'id_status' => mt_rand(4, 6),
            'deskripsi' => $this->faker->sentence(mt_rand(1, 4)),
            'foto' => $this->faker->sentence(4)
        ];
    }
}
