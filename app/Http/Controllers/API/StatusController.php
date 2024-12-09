<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Status;
use App\Http\Requests\StoreStatusRequest;
use App\Http\Requests\UpdateStatusRequest;
use App\Http\Resources\StatusResource;

/**
 * @group Status
 */
class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statusa = StatusResource::collection(
            Status::orderBy(
                request('column') ? request('column') : 'updated_at',
                request('direction') ? request('direction') : 'ASC'
            )->paginate(50)
        );

        return response()->json(
            [
                'data' => $statusa,
            ],
            200
        );
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
            'status' => 'Status Successfully Added!'
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
        $status->status = $input['status'];
        $status->statustype = $input['statustype'];

        $status->update();
        return response()->json([
            'status' => 'Status Successfully Updated !',
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
            if (in_array($status->id, [1, 2, 3, 4, 5, 6])) {
                return response()->json([
                    'error' => 'Validation failed',
                    'message' => 'Deletion is not allowed for Status ID.',
                ], 422);
            }
            $status->delete();
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to Delete Resource',
            ], 500);
        }
        return response()->json([
            'status' => 'Status Successfully Deleted!'
        ], 200);
    }
}
