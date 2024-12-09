<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHistoryMaintenanceRequest;
use App\Http\Requests\Storep_updateRequest;
use App\Models\PUpdate;
use App\Http\Requests\StorePUpdateRequest;
use App\Http\Requests\UpdateHistoryMaintenanceRequest;
use App\Http\Requests\Updatep_updateRequest;
use App\Http\Resources\PUpdateResource;
use App\Models\Asset;
use App\Models\Maintenance;
use App\Models\PMaintenanceUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * @group Maintenance
 */
class PUpdateController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function track(Maintenance $maintenance)
    {
        try {
            return response()->json(
                [
                    'data' => PUpdateResource::collection($maintenance->pupdates()->get()->all()),
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
     * @param  \App\Http\Requests\StoreHistoryMaintenanceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHistoryMaintenanceRequest $request, Maintenance $maintenance)
    {
        $input = $request->validated();
        $pupdate = new PMaintenanceUpdate();
        if (!is_null($input['image'])) {
            $imagepath = Storage::put('public/images/Maintenance', $request->file('image'));
            $pupdate->image = $imagepath;
        }
        // $maintenance->update();
        $pupdate->id_user = Auth::User()->id;
        $pupdate->id_maintenance = $maintenance->id;
        $pupdate->description = $input['description'];
        $pupdate->id_status = $input['status_id'];
        // handel untuk status ini masih belum sempurna masih ada beberapa kemungkinan seperti pergantian shift pekerja atau seperti maintenance yang tidak selesai dikerjakan dalam satu hari
        $asset = Asset::find($maintenance->id_asset);
        if ($input['status_id'] = 5) { //Dalam Perbaikan
            $asset->id_status = 1; //Dalam Perbaikan
        } elseif ($input['status_id'] = 6) { //Selesai
            $asset->id_status = 2; //Baik
        } elseif ($input['status_id'] = 4) { //Pending
            $asset->id_status = 3; //Rusak
        }
        $pupdate->save();
        $asset->update();
        return response()->json(['status' => 'Data Track Maintenance Berhasil Ditambahkan !'], 201);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePupdateMaintenanceRequest  $request
     * @param  \App\Models\PUpdate  $PUpdate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHistoryMaintenanceRequest $request, Maintenance $maintenance, PMaintenanceUpdate $pupdate)
    {
        try {
            $input = $request->validated();
            $pupdate->id_user = Auth::user()->id;
            $pupdate->id_status = $input['status_id'];
            $pupdate->description = $input['description'];
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($pupdate->image && Storage::exists($pupdate->image)) {
                    Storage::delete($pupdate->image);
                }
                // Store the new image and set the path
                $imagepath = $request->file('image')->store('public/images/Maintenance');
                $pupdate->image = $imagepath;
            }
            if ($pupdate->update()) {
                return response()->json(['status' => 'Data Update Maintenance Berhasil Diperbarui !'], 201);
            };
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to update resource',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PUpdate  $PUpdate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maintenance $maintenance, PMaintenanceUpdate $pupdate)
    {
        // auto reset status maintenance and asset using latest history, if maintenance has done
        try {
            // Check if the pupdate is at least two days old
            $twoDaysAgo = now()->subDays(2);
            if ($pupdate->created_at < $twoDaysAgo) {
                return response()->json([
                    'error' => 'Cannot delete this update because it has not reached the minimum lifetime of 2 days.'
                ], 403);
            }

            // Delete the specified pupdate
            if ($pupdate->delete()) {

                // Retrieve the latest update after deletion, if it exists
                $latestUpdate = $maintenance->pupdates()->latest()->first();

                // If a previous update exists, reset the maintenance status to match its status
                if ($latestUpdate) {
                    $maintenance->id_status = $latestUpdate->id_status;
                } else {
                    // No previous updates exist; reset to default status
                    $maintenance->status = 'pending'; // or your chosen default
                }

                $maintenance->save();

                return response()->json(['status' => 'Update deleted, and maintenance status reset successfully.'], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to delete update or reset maintenance status.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function explore(Request $request)
    {
        try {
            $query = PMaintenanceUpdate::query();
            // Filter by status_id if provided
            if ($request->filled('status_id')) {
                $query->where('id_status', $request->input('status_id'));
            }

            // Filter by asset_id if provided
            // Filter by asset_id indirectly via Maintenance relationship
            if ($request->filled('asset_id')) {
                $assetId = $request->input('asset_id');

                $query->whereHas('maintenance', function ($maintenanceQuery) use ($assetId) {
                    $maintenanceQuery->where('id_asset', $assetId);
                });
            }

            // Filter by user_id if provided
            if ($request->filled('user_id')) {
                $query->where('id_user', $request->input('user_id'));
            }

            // Filter by maintenance ID if provided
            if ($request->filled('maintenance_id')) {
                $query->where('id_maintenance', $request->input('maintenance_id'));
            }

            $pupdates = PUpdateResource::collection($query->get());

            // return response()->json($pupdates);
            return response()->json(
                [
                    'data' => PUpdateResource::collection($query->get()),
                ],
                200,
                [],
                JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT
            );
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to get resource',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
