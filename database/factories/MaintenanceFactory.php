<?php

namespace Database\Factories;

use App\Models\Asset;
use App\Models\Maintenance;
use App\Models\PMaintenanceUpdate;
use App\Models\PUpdate;
use App\Models\Status;
use App\Models\TypeMaintenance;
use App\Models\UrgencyLevel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Log;

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
            'id_user' => User::where('id', '!=', 1)->pluck('id')->random(),
            'id_asset' => Asset::pluck('id')->random(),
            'id_type' => TypeMaintenance::pluck('id')->random(),
            'id_urgency' => UrgencyLevel::pluck('id')->random(),
            'id_status' => Status::where('statustype', 'MTNC')->pluck('id')->random(),
            'description' => $this->faker->sentence(mt_rand(2, 10)),
            'imagebefore' => $this->faker->sentence(mt_rand(2, 5)),
            'imageafter' => $this->faker->sentence(mt_rand(2, 5)),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
    public function configure()
    {
        return $this->afterCreating(function (Maintenance $maintenance) {
            // $rule = PMaintenanceUpdate::factory()->count(2)->create(['id_maintenance' => $maintenance->id]);
            // $maintenance->pUpdates()->saveMany($rule, ['created_at' => now(), 'updated_at' => now()]);
            // try {
            //     $rule = PMaintenanceUpdate::factory()->count(2)->create(['id_maintenance' => $maintenance->id]);
            //     $maintenance->pUpdates()->saveMany($rule);
            //     Log::info('Maintenance ID: ' . $maintenance->id);
            //     Log::info('PMaintenanceUpdate Created: ', $rule->toArray());
            // } catch (\Exception $e) {
            //     Log::error($e->getMessage());
            // }
        });
    }
}
