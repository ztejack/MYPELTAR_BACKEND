<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Http\Requests\StorelocationRequest;
use App\Http\Requests\UpdatelocationRequest;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([Location::all()]);
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
     * @param  \App\Http\Requests\StorelocationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorelocationRequest $request)
    {
        $input = $request->validated();
        $location = new Location();
        $location->unit = $input['unit'];
        $location->save();
        return response()->json([
            'status' => 'Lokasi Berhasil Ditambahkan !'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $Location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        return response()->json(['data' => $location], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $Location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $lokasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatelocationRequest  $request
     * @param  \App\Models\Location  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatelocationRequest $request, Location $location)
    {
        $input = $request->validated();
        $location->unit = $input['unit'];
        $location->update();
        return response()->json([
            'status' => 'Lokasi Berhasil Diupdate !',
            'location' => $location
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        if (!$location->delete()) {
            return response()->withErrors($location->errors());
        }
        return response()->json([
            'status' => 'Lokasi Berhasil Dihapus !'
        ], 200);
    }
}
