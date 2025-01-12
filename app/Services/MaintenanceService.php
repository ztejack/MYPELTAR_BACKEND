<?php

namespace App\Services;

use App\Models\Maintenance;
use App\Models\PMaintenanceUpdate;
use App\Models\Asset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class MaintenanceService
{
    /**
     * Store a new maintenance record.
     *
     * @param array $data
     * @return Maintenance
     * @throws \Exception
     */
    public function storeMaintenance(object $data): Maintenance
    {
        return DB::transaction(function () use ($data) {
            $status_id = 4; // Default status
            $urgency_id = $data->urgency_id ?? 1;

            // Create new maintenance record
            $maintenance = new Maintenance();
            $maintenance->id_user = Auth::user()->id;

            if (isset($data->imagebefore) && $data->imagebefore) {
                // $imagepath = Storage::put('public/images/Maintenance', $data['imagebefore']);!
                $imagepath = Storage::put('public/images/Maintenance', $data->file('imagebefore'));
                $maintenance->imagebefore = $imagepath;
            }

            $maintenance->id_asset = $data->asset_id;
            $maintenance->id_type = $data->type_id;
            $maintenance->id_urgency = $urgency_id;
            $maintenance->description = $data->description;
            $maintenance->id_status = $status_id;
            $maintenance->save();

            // Create PMaintenanceUpdate record
            $pupdate = new PMaintenanceUpdate();
            $pupdate->id_user = $maintenance->id_user;
            $pupdate->id_maintenance = $maintenance->id;
            $pupdate->id_status = $status_id;
            $pupdate->description = $data->description;
            if (isset($maintenance->imagebefore)) {
                $pupdate->image = $maintenance->imagebefore;
            }
            $pupdate->save();

            // Update asset status
            $asset = Asset::findOrFail($data->asset_id);
            $asset->id_status = 3; // Example: Set asset status to "under maintenance"
            $asset->save();

            return $maintenance;
        });
    }
}
