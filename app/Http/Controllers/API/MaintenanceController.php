<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Maintenance;
use App\Http\Requests\StoremaintenanceRequest;
use App\Http\Requests\UpdateMaintenanceRequest;
use App\Http\Requests\UpdatePupdateMaintenanceRequest;
use App\Http\Resources\AssetResource;
use App\Http\Resources\MaintenanceResource;
use App\Models\Asset;
use App\Models\Inspeksi;
use App\Models\PMaintenanceUpdate;
use App\Models\PUpdate;
use App\Models\User;
use App\Services\MaintenanceService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use LdapRecord\Query\Events\Paginate;


/**
 * @group Maintenance
 */
class MaintenanceController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $maintenances = Maintenance::latest()->paginate(50);
            return response()->json(
                [
                    "data" =>
                    MaintenanceResource::collection($maintenances)
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function self_get()
    {
        try {
            $maintenances = Maintenance::where('id_user', Auth::user()->id)->latest()->paginate(50);
            return response()->json(
                [
                    'data' =>
                    MaintenanceResource::collection($maintenances),
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoremaintenanceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMaintenanceRequest $request)
    {
        try {
            $this->maintenanceService->storeMaintenance($request);

            return response()->json(['status' => 'Maintenance Successfully Stored !'], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to store maintenance',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function show(Maintenance $maintenance)
    {
        try {
            $maintenances = MaintenanceResource::make($maintenance);
            return response()->json(
                ['data' => $maintenances],
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

    /**
     *
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMaintenanceRequest  $request
     * @param  \App\Models\maintenance  $maintenance
     * @param  \public\image\maintenance\ $imagepath
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatemaintenanceRequest $request, Maintenance $maintenance)
    {
        $this->authorize('update-maintenance', $maintenance);
        $input = $request->validated();
        try {
            $maintenance->id_type = $input['type_id'];
            $maintenance->id_urgency = $input['urgency_id'];
            $maintenance->description = $input['description'];
            $pupdate = new PMaintenanceUpdate();
            if (!is_null($input['imagebefore'])) {
                $imagepath = Storage::put('public/images/Maintenance', $request->file('imagebefore'));
                $maintenance->imagebefore = $imagepath;
                $pupdate->image = $imagepath;
            }
            $maintenance->save();
            $pupdate->id_user = Auth::user()->id;
            $pupdate->id_maintenance = $maintenance->id;
            $pupdate->id_status = $input['status_id'];
            $pupdate->description = $input['description'];
            $pupdate->save();
            return response()->json(['status' => 'Maintenance Successfully Updated !'], 201);
        } catch (ModelNotFoundException $e) {
            // Catch when the maintenance record is not found
            return response()->json([
                'message' => 'The maintenance record was not found.',
            ], 404);
        } catch (\Exception $e) {
            // Catch other exceptions
            return response()->json([
                'message' => 'Failed to update resource.',
                'error' => $e->getMessage(), // Expose detailed error in non-production environments only
            ], 500);
        }
    }

    /* apply maintenance to be repaired*/
    public function maintenance_aplly(Request $request, Maintenance $maintenance)
    {
        try {
            $user = Auth::user();
            $maintenance->id_status = 5;
            $pupdate = new PMaintenanceUpdate();
            $pupdate->id_user = Auth::user()->id;
            $pupdate->id_maintenance = $maintenance->id;
            $pupdate->id_status = 5;
            $pupdate->description = "Maintenance apply by " . $user->name;
            $pupdate->save();
            $maintenance->update();
        } catch (\Exception $e) {
            // Catch other exceptions
            return response()->json([
                'message' => 'Failed to apply.',
                'error' => $e->getMessage(), // Expose detailed error in non-production environments only
            ], 500);
        }
        return response()->json(['status' => 'Maintenance Successfully Aplly !'], 201);
    }
    public function cancle_maintenance_apply(Request $request, Maintenance $maintenance)
    {
        try {
            $user = Auth::user();
            $maintenance->id_status = 4;
            $pupdate = new PMaintenanceUpdate();
            $pupdate->id_user = Auth::user()->id;
            $pupdate->id_maintenance = $maintenance->id;
            $pupdate->id_status = 4;
            $pupdate->description = "Maintenance cancle apply by " . $user->name;
            $pupdate->save();
            $maintenance->update();
        } catch (\Exception $e) {
            // Catch other exceptions
            return response()->json([
                'message' => 'Failed to cancle resource.',
                'error' => $e->getMessage(), // Expose detailed error in non-production environments only
            ], 500);
        }
        return response()->json(['status' => 'Maintenance Successfully Cancle !'], 201);
    }

    /* ONLY FOR production*/
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maintenance $maintenance)
    {
        try {
            if (!$maintenance->pUpdates->isEmpty()) {
                foreach ($maintenance->pUpdates as $update) {
                    if (Storage::exists($update->image)) {
                        Storage::delete($update->image);
                    }
                    $update->delete();
                }
            }
            if (Storage::exists($maintenance->imagebefore)) {
                Storage::delete($maintenance->imagebefore);
            }
            if (Storage::exists($maintenance->imageafter)) {
                Storage::delete($maintenance->imageafter);
            }
            $maintenance->delete();
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to delete resource',
            ], 500);
        }
        return response()->json([
            'status' => 'Maintenance successfully deleted !',
        ], 200);
    }
}
