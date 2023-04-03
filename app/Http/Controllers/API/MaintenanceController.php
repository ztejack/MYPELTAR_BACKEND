<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Maintenance;
use App\Http\Requests\StoremaintenanceRequest;
use App\Http\Requests\UpdatemaintenanceRequest;
use App\Http\Resources\MaintenanceResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([MaintenanceResource::collection(Maintenance::all())]);
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
        $input = $request->validated();
        $maintenance = new Maintenance();
        $maintenance->id_user_inspektor = Auth::user()->id;
        $maintenance->id_asset = $input['id_asset'];
        $maintenance->id_type = $input['id_type'];
        $maintenance->deskripsi = $input['deskripsi'];
        $maintenance->fotoafter = null;
        // $maintenance->fotobefore = $request->file('fotobefore')->store('images/Maintenance', 'public');
        $maintenance->fotobefore = Storage::put('public/images/Maintenance', $request->file('fotobefore'));

        $maintenance->save();
        return response()->json(MaintenanceResource::make($maintenance));
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
        //
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
