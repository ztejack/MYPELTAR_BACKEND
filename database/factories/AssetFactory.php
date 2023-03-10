<?php

namespace Database\Factories;

use App\Models\Asset;
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
            'stockcode' => mt_rand(1, 5),
            // 'code' => $this->faker->macAddress(),
            // 'code' => $this->assetcode($strserial, $num),
            'serialnumber' => $this->assetcode($strcode, $num),
            'name' => fake()->name(),
            'merk' => $this->faker->sentence(mt_rand(1, 3)),
            'model' => $this->faker->sentence(mt_rand(1, 3)),
            'spesifikasi' => $this->faker->sentence(mt_rand(1, 3)),
            'deskripsi' => $this->faker->sentence(mt_rand(1, 3)),
            'id_lokasi' => mt_rand(1, 5),
            // 'id_kategori' => mt_rand(1, 5),
            'id_status' => mt_rand(1, 4),
        ];
    }
}
