<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Http\Requests\StorelocationRequest;
use App\Http\Requests\UpdatelocationRequest;
use App\Http\Resources\LocationResource;

/**
 * @group Location
 */
class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $location = LocationResource::collection(
            Location::orderBy(
                request('column') ? request('column') : 'updated_at',
                request('direction') ? request('direction') : 'desc'
            )->paginate(50)
        );

        return response()->json(
            [
                'data' => $location,
            ],
            200
        );
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
        try {
            $input = $request->validated();
            $location = new Location();
            $location->unit = $input['unit'];
            $location->save();
            return response()->json([
                'status' => 'Location Successfully Added !'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to delete resource',
                // 'message' => 'Status memilki relasi',
            ], 500);
        }
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
        try {
            $input = $request->validated();
            $location->unit = $input['unit'];
            $location->update();
            return response()->json([
                'status' => 'Location Successfully Updated !',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to delete resource',
                // 'message' => 'Status memilki relasi',
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {

        try {
            $location->delete();
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to delete resource',
                // 'message' => 'Status memilki relasi',
            ], 500);
        }
        return response()->json([
            'status' => 'Location Successfully Deleted !'
        ], 200);
    }
}
