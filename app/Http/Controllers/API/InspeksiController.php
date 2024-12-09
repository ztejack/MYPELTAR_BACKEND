<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInspeksiRequest;
use App\Http\Resources\InspeksiResource;
use App\Models\Inspeksi;
use App\Models\Maintenance;
use App\Models\Status;
use Illuminate\Http\Request;

class InspeksiController extends Controller
{
    public function index()
    {
        $inspeksi = Inspeksi::latest()->paginate(50);
        return response()->json(
            [
                'data' => InspeksiResource::collection($inspeksi),
            ],
            200,
            [],
            JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT
        );
    }
    public function store(StoreInspeksiRequest $request)
    {
        // Store the uploaded image
        $imagePath = $request->file('image')->store('inspeksi_images', 'public');

        // Create the Inspeksi record
        $inspeksi = Inspeksi::create([
            'image' => $imagePath,
            'description' => $request->desc,
            'user_id' => $request->user_id,
            'asset_id' => $request->asset_id,
        ]);

        // Check if maintenance is needed
        if ($request->has('maintenance_needed') && $request->maintenance_needed) {
            // Store the uploaded image for maintenance
            $maintenanceImagePath = $request->file('image')->store('maintenance_images', 'public');

            // Get the id of the first matching Status record
            $status = Status::where('statustype', 'MTNC')->where('status', 'Pending')->first();

            // gunakan fungsi maintenance apply
            // Create the Maintenance record
            // Maintenance::create([
            //     'id_asset' => $inspeksi->asset_id,
            //     'id_type' => true,
            //     'id_user_inspeksi' => $inspeksi->user_id,
            //     'imagebefore' => $maintenanceImagePath,
            //     'inspeksi_id' => $inspeksi->id,
            // ]);
        }

        return response()->json($inspeksi, 201);
    }
}
