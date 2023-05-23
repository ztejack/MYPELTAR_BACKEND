<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(mt_rand(1, 3)),
            'image' => 'public/storage/example.png',
            'deskripsi' => $this->faker->sentence(mt_rand(5, 10)),
            'id_user' => mt_rand(1, 4)
        ];
    }
}
