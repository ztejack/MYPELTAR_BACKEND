<?php

namespace Database\Factories;

use App\Models\Asset;
use App\Models\Category;
use App\Models\Location;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\asset>
 */
class AssetFactory extends Factory
{
    private static $numb = 0;
    public function assetcode($str, $numbr)
    {
        $string = preg_replace("/[^0-9\.]/", '', $numbr);

        return $str . sprintf('%05d', $string + 1);
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $num = self::$numb++;
        $strserial = 'FAKESerial';
        $strcode = 'AST';

        return [
            'stockcode' => mt_rand(1, 200),
            'code_ast' => $this->assetcode($strcode, $num),
            // 'code' => $this->assetcode($strserial, $num),
            'serialnumber' => $this->assetcode($strserial, $num),
            'name' => fake()->name(),
            'merk' => $this->faker->sentence(mt_rand(1, 3)),
            'model' => $this->faker->sentence(mt_rand(1, 3)),
            'image' => 'public/images/News/example.png',
            'spesifikasi' => $this->faker->sentence(mt_rand(1, 3)),
            'deskripsi' => $this->faker->sentence(mt_rand(1, 3)),
            'id_lokasi' => Location::pluck('id')->random(),
            // 'id_kategori' => mt_rand(1, 5),
            'id_status' => Status::where('statustype', 'ASST')->pluck('id')->random()
        ];
    }
    public function configure()
    {
        return $this->afterCreating(function (Asset $asset) {
            // $categories = Category::factory()->count(2)->create();
            $categories = Category::inRandomOrder()->first();
            $asset->category()->attach($categories, ['created_at' => now(), 'updated_at' => now()]);
        });
    }
}
