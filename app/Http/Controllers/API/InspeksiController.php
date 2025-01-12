<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInspeksiRequest;
use App\Http\Requests\UpdateInspeksiRequest;
use App\Http\Resources\InspeksiResource;
use App\Models\Inspeksi;
use App\Models\Maintenance;
use App\Models\Status;
use App\Services\MaintenanceService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class InspeksiController extends Controller
{
    protected $maintenanceService;

    /**
     * Inject the MaintenanceService.
     *
     * @param MaintenanceService $maintenanceService
     */
    public function __construct(MaintenanceService $maintenanceService)
    {
        $this->maintenanceService = $maintenanceService;
    }
    public function index()
    {
        try {
            $inspeksi = Inspeksi::latest()->paginate(50);
            return response()->json(
                [
                    'data' => InspeksiResource::collection($inspeksi),
                ],
                200,
                [],
                JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT
            );
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to get resource',
            ], 500);
        }
    }

    public function store(StoreInspeksiRequest $request)
    {
        try {
            $validated = $request->validated();
            // Custom logic for inspeksi
            $inspeksi = new Inspeksi();
            $inspeksi->id_user = Auth::user()->id;
            if ($validated['maintenance_needed']) {
                // Trigger maintenance creation
                $maintenanceData = (object) [
                    'id_user' => Auth::user()->id,
                    'description' => "Maintenance otomatis untuk inspeksi: " . $inspeksi->description,
                    'asset_id' => $validated['asset_id'],
                    'type_id' => 1, // Example: Type for inspections
                    'urgency_id' => $validated['urgency_id'],
                ];
                $maintenance = $this->maintenanceService->storeMaintenance($maintenanceData);
                $inspeksi->id_maintenance =  $maintenance->id;
            }
            if (isset($validated['image']) && $validated['image']) {
                $imagepath = Storage::put('public/images/Inspeksi', $request->file('image'));
                $inspeksi->image = $imagepath;
            }
            $inspeksi->description = $validated['description'];
            $inspeksi->id_asset = $validated['asset_id'];
            $inspeksi->save();

            return response()->json(['status' => 'Inspeksi Successfully Stored !'], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to store inspeksi',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(UpdateInspeksiRequest $request, Inspeksi $inspeksi)
    {
        $this->authorize('update-inspeksi', $inspeksi);
        $input = $request->validated();
        try {
            if ($input['maintenance_needed']) {
                $maintenance = Maintenance::find($inspeksi->id_maintenance);
                if ($maintenance) {
                    $maintenance->description = "Updated maintenance for inspeksi: " . $inspeksi->description;
                    $maintenance->id_urgency = $input['urgency_id'];
                    $maintenance->save();
                } else {
                    $maintenanceData = (object) [
                        'id_user' => Auth::user()->id,
                        'description' => "Maintenance otomatis untuk inspeksi: " . $inspeksi->description,
                        'asset_id' => $inspeksi->id_asset,
                        'type_id' => 1,
                        'urgency_id' => $input['urgency_id'],
                    ];
                    $maintenance = $this->maintenanceService->storeMaintenance($maintenanceData);
                    $inspeksi->id_maintenance = $maintenance->id;
                }
            }
            $inspeksi->description = $input['description'];
            $inspeksi->id_asset = $input['asset_id'];
            if (isset($input['image']) && $input['image']) {
                $imagepath = Storage::put('public/images/Inspeksi', $request->file('image'));
                $inspeksi->image = $imagepath;
            }
            $inspeksi->save();
            return response()->json(
                ['status' => 'Inspeksi Successfully Updated!'],
                200
            );
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'The maintenance record was not found.',
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update resource.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function show(Inspeksi $inspeksi)
    {
        try {
            $inspeksis = InspeksiResource::make($inspeksi);
            return response()->json(
                ['data' => $inspeksis],
                200,
                [],
                JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT
            );
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to get resource',
            ], 500);
        }
    }

    public function destroy(Inspeksi $inspeksi)
    {
        try {
            $inspeksi->delete();
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to delete resource',
            ], 500);
        }
        return response()->json([
            'status' => 'Inspeksi successfully deleted !',
        ], 200);
    }
}
