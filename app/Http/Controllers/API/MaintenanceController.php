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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use LdapRecord\Query\Events\Paginate;


/**
 * @group Maintenance
 */
class MaintenanceController extends Controller
{
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
            return response()->json([
                'data' =>
                MaintenanceResource::collection($maintenances),
                200,
                [],
                JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT
            ]);
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
    public function store(StoremaintenanceRequest $request)
    {
        try {
            $input = $request->validated();
            $status_id = 4;
            $maintenance = new Maintenance();
            $maintenance->id_user = Auth::user()->id;
            $pupdate = new PMaintenanceUpdate();
            if (isset($input['imagebefore'])) {
                if ($input['imagebefore']) {
                    $imagepath = Storage::put('public/images/Maintenance', $request->file('imagebefore'));
                    $maintenance->imagebefore = $imagepath;
                    $pupdate->image = $imagepath;
                }
            }
            $maintenance->id_asset = $input['asset_id'];
            $maintenance->id_type = $input['type_id'];
            $maintenance->description = $input['description'];
            $maintenance->id_status = $status_id;

            $maintenance->save();
            $pupdate->id_user = $maintenance->id_user;
            $pupdate->id_maintenance = $maintenance->id;
            $pupdate->id_status = $status_id;
            $pupdate->id_urgency = $urgency_id;
            $pupdate->description = $input['description'];
            $pupdate->save();

            $asset = Asset::find($input['asset_id']);
            $asset->id_status = 3;
            $asset->save();
            return response()->json(['status' => 'Data Maintenance Berhasil Ditambahkan !'], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to store resource',
                // for production only
                'messange' => $e->getMessage(),
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
    public function update(UpdatemaintenanceRequest $request, $Maintenance)
    {
        $input = $request->validated();
        try {

            $maintenance = Maintenance::find($Maintenance);
            $maintenance->id_type = $input['type_id'];
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
            return response()->json(['status' => 'Data Maintenance Berhasil Diupdate !'], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to update resource',
            ], 500);
        }
    }

    /* need refision*/
    public function maintenance_aplly(Request $request, Maintenance $maintenance)
    {
        $inspeksi = new Inspeksi;
        $inspeksi->id_user = Auth::user()->id;
        $inspeksi->id_asset = $request['asset'];

        $inspeksi->save();
        $maintenance->inspeksi()->attach($inspeksi->id);
        return response()->json([$maintenance, $inspeksi]);
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
            'status' => 'Track Maintenance successfully deleted !',
        ], 200);
    }
}
