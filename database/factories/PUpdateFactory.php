<?php

namespace Database\Factories;

use App\Models\User;
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
            'id_user' => User::pluck('id')->random(),
            'id_maintenance' => mt_rand(1, 50),
            'id_status' => mt_rand(4, 6),
            'deskripsi' => $this->faker->sentence(mt_rand(1, 4)),
            'image' => 'public/images/News/example.png'
        ];
    }
}
