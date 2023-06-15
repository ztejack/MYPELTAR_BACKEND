<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Maintenance;
use App\Http\Requests\StoremaintenanceRequest;
use App\Http\Requests\UpdatemaintenanceRequest;
use App\Http\Requests\UpdatePupdateMaintenanceRequest;
use App\Http\Resources\AssetResource;
use App\Http\Resources\MaintenanceResource;
use App\Models\Asset;
use App\Models\PUpdate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use LdapRecord\Query\Events\Paginate;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maintenances = Maintenance::latest()->paginate(50);
        return response()->json(MaintenanceResource::collection($maintenances));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function self_get()
    {
        $maintenances = User::maintenance()->where('id_user_inspeksi',Auth::user()->id)->latest()->paginate(50);
        return response()->json(MaintenanceResource::collection($maintenances));
    }

    /** 
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoremaintenanceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoremaintenanceRequest $request)
    {
        $status_id = 4;
        $input = $request->validated();
        $maintenance = new Maintenance();
        $maintenance->id_user_inspeksi = Auth::user()->id;
        $pupdate = new PUpdate();
        if (!is_null($input['imagebefore'])) {
            $imagepath = Storage::put('public/images/Maintenance', $request->file('imagebefore'));
            $maintenance->imagebefore = $imagepath;
            $pupdate->image = $imagepath;
        }
        $maintenance->id_asset = $input['id_asset'];
        $maintenance->id_type = $input['id_type'];
        $maintenance->deskripsi = $input['deskripsi'];
        $maintenance->save();
        $pupdate->id_user = $maintenance->id_user_inspeksi;
        $pupdate->id_maintenance = $maintenance->id;
        $pupdate->id_status = $status_id;
        $pupdate->save();

        $asset = Asset::find($input['id_asset']);
        $asset->id_status = $status_id;
        $asset->save();
        return response()->json(['status' => 'Data Maintenance Berhasil Ditambahkan !'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function show(Maintenance $maintenance)
    {
        // $maintenances = Maintenance::find($maintenance)
        $maintenances = MaintenanceResource::make($maintenance);
        return response()->json(['data' => $maintenances], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatemaintenanceRequest  $request
     * @param  \App\Models\maintenance  $maintenance
     * @param  \public\image\maintenance\ $imagepath
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatemaintenanceRequest $request, $Maintenance)
    {
        $input = $request->validated();
        $maintenance = Maintenance::find($Maintenance);
        $maintenance->id_type = $input['id_type'];
        $maintenance->deskripsi = $input['deskripsi'];
        $pupdate = new PUpdate();
        if (!is_null($input['imagebefore'])) {
            $imagepath = Storage::put('public/images/Maintenance', $request->file('imagebefore'));
            $maintenance->imagebefore = $imagepath;
            $pupdate->image = $imagepath;
        }
        $maintenance->save();
        $pupdate->id_user = Auth::user()->id;
        $pupdate->id_maintenance = $maintenance->id;
        $pupdate->id_status = $input['id_status'];
        $pupdate->deskripsi = $input['deskripsi_update'];
        $pupdate->update();
        return response()->json(['status' => 'Data Maintenance Berhasil Diupdate !'], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maintenance $maintenance)
    {
        try {
            if (Storage::exists($maintenance->imagebefore)) {
                Storage::delete($maintenance->imagebefore);
            }
            if (Storage::exists($maintenance->imageafter)) {
                Storage::delete($maintenance->imageafter);
            }
            foreach ($maintenance->pupdate as $update) {
                if (Storage::exists($update->image)) {
                    Storage::delete($update->image);
                }
            }
            $maintenance->delete();
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to delete resource',
            ], 500);
        }
        return response()->json([
            'status' => 'Track Maintenance Berhasil Dihapus !',
        ], 200);
    }
}
