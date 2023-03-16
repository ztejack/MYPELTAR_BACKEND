<?php

namespace App\Http\Controllers;

use App\Models\StatusAssets;
use App\Http\Requests\StoreStatusAssetsRequest;
use App\Http\Requests\UpdateStatusAssetsRequest;
use App\Models\Asset;

class StatusAssetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statusa = StatusAssets::all();
        return response()->json(['data' => $statusa]);
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
     * @param  \App\Http\Requests\StoreStatusAssetsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStatusAssetsRequest $request)
    {
        $input = $request->validated();
        $statusa = new StatusAssets();
        $statusa->status = $input['status'];
        $statusa->save();
        return response()->json([
            'status' => 'Status Berhasil Ditambahkan !'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StatusAssets  $statusAssets
     * @return \Illuminate\Http\Response
     */
    public function show(StatusAssets $statusassets)
    {
        return response()->json(['data' => $statusassets], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StatusAssets  $statusAssets
     * @return \Illuminate\Http\Response
     */
    public function edit(StatusAssets $statusAssets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStatusAssetsRequest  $request
     * @param  \App\Models\StatusAssets  $statusAssets
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStatusAssetsRequest $request, StatusAssets $statusAssets)
    {
        $input = $request->validated();
        $statusAssets->unit = $input['status'];
        $statusAssets->update();
        return response()->json([
            'status' => 'Status Berhasil Diupdate !',
            'statusasset' => $statusAssets
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StatusAssets  $statusassets
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusAssets $statusassets)
    {
        // if (!$statusassets->delete()) {
        //     return response()->withErrors($statusassets->errors());
        // }
        $statusassets->delete();
        return response()->json([
            'status' => 'Status Berhasil Dihapus !',
            'data' => $statusassets->asset
        ], 200);
    }
}
