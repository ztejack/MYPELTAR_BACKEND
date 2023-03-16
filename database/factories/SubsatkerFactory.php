<?php

namespace Database\Factories;

use App\Models\Satker;
use App\Models\Subsatker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\subsatker>
 */
class SubsatkerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'subsatker' => $this->faker->sentence(1),
            'id_satker' => function () {
                return Satker::factory()->create()->id;
            }
        ];
    }
    // public function configure()
    // {
    //     return $this->beforeCreating(function (Subsatker $subsatker) {
    //         $subsatker->id_satker = function () {
    //             return Satker::factory()->create()->id;
    //         };
    //     });
    // }
}
