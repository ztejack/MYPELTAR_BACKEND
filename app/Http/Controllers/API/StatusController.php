<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Status;
use App\Http\Requests\StoreStatusRequest;
use App\Http\Requests\UpdateStatusRequest;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statusa = Status::orderBy(
            request('column') ? request('column') : 'updated_at',
            request('direction') ? request('direction') : 'desc'
        )->paginate(50);
        return response()->json(['data' => $statusa]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStatusRequest $request)
    {
        $input = $request->validated();
        $statusa = new Status();
        $statusa->status = $input['status'];
        $statusa->statustype = $input['statustype'];
        $statusa->save();
        return response()->json([
            'status' => 'Status Berhasil Ditambahkan !'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        return response()->json(['data' => $status], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStatusRequest  $request
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStatusRequest $request, Status $status)
    {
        $input = $request->validated();
        $status->unit = $input['status'];
        $status->update();
        return response()->json([
            'status' => 'Status Berhasil Diupdate !',
            'statusasset' => $status
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        try {
            $status->delete();
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to delete resource',
                // 'message' => 'Status memilki relasi',
            ], 500);
        }
        return response()->json([
            'status' => 'Status Berhasil Dihapus !',
        ], 200);
    }
}
