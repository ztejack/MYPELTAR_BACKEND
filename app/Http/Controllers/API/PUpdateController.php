<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHistoryMaintenanceRequest;
use App\Http\Requests\Storep_updateRequest;
use App\Models\PUpdate;
use App\Http\Requests\StorePUpdateRequest;
use App\Http\Requests\UpdateHistoryMaintenanceRequest;
use App\Http\Requests\Updatep_updateRequest;
use App\Models\Asset;
use App\Models\Maintenance;
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
    public function show(Maintenance $maintenance)
    {
        // $maintenances = Maintenance::find($maintenance)
        return response()->json(['data' => $maintenance->pupdates()], 200);
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
        $pupdate = new PUpdate();
        if (!is_null($input['imagebefore'])) {
            $imagepath = Storage::put('public/images/Maintenance', $request->file('imagebefore'));
            $pupdate->image = $imagepath;
        }
        $maintenance->update();
        $pupdate->id_user = $maintenance->id_user_inspeksi;
        $pupdate->id_maintenance = $maintenance->id;
        $pupdate->id_status = $input['id_status'];
        $pupdate->save();

        $asset = Asset::find($input['id_asset']);
        $asset->id_status = $input['id_status'];
        $asset->save();
        return response()->json(['status' => 'Data Maintenance Berhasil Ditambahkan !'], 201);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePupdateMaintenanceRequest  $request
     * @param  \App\Models\PUpdate  $PUpdate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHistoryMaintenanceRequest $request, $Maintenance, $PUpdate)
    {
        $input = $request->validated();
        $maintenance = Maintenance::findorfail($Maintenance);
        $pupdate = $maintenance->pupdates()->findorfail($PUpdate);
        $pupdate->id_user = Auth::user()->id;
        $pupdate->id_status = $input['id_status'];
        $pupdate->deskripsi = $input['deskripsi_update'];
        if (!is_null($input['image'])) {
            $imagepath = Storage::put('public/images/Maintenance', $request->file('image'));
            $pupdate->image = $imagepath;
        }
        if ($pupdate->update()) {
            return response()->json(['status' => 'Data Update Maintenance Berhasil Diperbarui !'], 201);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PUpdate  $PUpdate
     * @return \Illuminate\Http\Response
     */
    public function destroy(PUpdate $PUpdate)
    {
        //
    }
}
