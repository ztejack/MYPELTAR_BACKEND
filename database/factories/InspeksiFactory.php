<?php

namespace Database\Factories;

use App\Models\Asset;
use App\Models\Maintenance;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inspeksi>
 */
class InspeksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'description' => $this->faker->sentence(mt_rand(1, 3)),
            'image' => 'public/images/News/example.png',
            'id_user' => User::whereHas('roles', function ($query) {
                $query->where('name', 'Inspeksi');
            })->pluck('id')->random(),
            'id_maintenance' => Maintenance::where('id_type', 1)->pluck('id')->random(),
            'id_asset' => Asset::pluck('id')->random(),
        ];
    }
}
