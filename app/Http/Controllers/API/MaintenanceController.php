<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Maintenance;
use App\Http\Requests\StoremaintenanceRequest;
use App\Http\Requests\UpdatemaintenanceRequest;
use App\Http\Resources\AssetResource;
use App\Http\Resources\MaintenanceResource;
use App\Models\Asset;
use App\Models\PUpdate;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $pupdate = new PUpdate();
        if (!is_null($input['fotobefore'])) {
            $fotopath = Storage::put('public/images/Maintenance', $request->file('fotobefore'));
            $maintenance->fotobefore = $fotopath;
            $pupdate->foto = $fotopath;
        }
        $maintenance->id_user_inspektor = Auth::user()->id;
        $maintenance->id_asset = $input['id_asset'];
        $maintenance->id_type = $input['id_type'];
        $maintenance->deskripsi = $input['deskripsi'];
        $maintenance->save();

        $pupdate->id_user = $maintenance->id_user_inspektor;
        $pupdate->id_maintenance = $maintenance->id;
        $pupdate->id_status = $status_id;
        $pupdate->save();

        $asset = Asset::find($input['id_asset']);
        $asset->id_status = $status_id;
        $asset->save();
        return response()->json(['status' => 'Data Maintenance Berhasil Ditambahkan !'], 201);
        // return response()->json($input->id_type);
        // return response()->json(MaintenanceResource::make($maintenance));
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function edit(Maintenance $maintenance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatemaintenanceRequest  $request
     * @param  \App\Models\maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatemaintenanceRequest $request, maintenance $maintenance)
    {
        $input = $request->validated();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maintenance $maintenance)
    {
        //
    }
}
