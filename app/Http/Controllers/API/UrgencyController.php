<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUrgencyLevel;
use App\Http\Requests\UpdateUrgencyLevel;
use App\Models\UrgencyLevel;
use Illuminate\Support\Facades\Log;

class UrgencyController extends Controller
{
    /**
     * Display a listing of urgency levels.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $data = UrgencyLevel::all();
            return response()->json(
                [
                    'data' => $data,
                ],
            );
        } catch (\Exception $e) {
            Log::error('Error fetching urgency levels: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to retrieve urgency levels.']);
        }
    }

    /**
     * Store a new urgency level.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreUrgencyLevel $request)
    {
        try {
            $validatedData = $request->validated();
            $urgencyLevel = UrgencyLevel::create($validatedData);
            return response()->json([
                'status' => 'Urgency Level Successfully Added!'
            ], 201);
        } catch (\Exception $e) {
            Log::error('Error creating urgency level: ' . $e->getMessage());
            // return response()->json(['error' => 'Failed to create urgency level.']);
            return response()->json([
                'error' => 'Failed to create urgency level.',
                // for production only
                'messange' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update an existing urgency level.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateUrgencyLevel $request, UrgencyLevel $urgency)
    {
        $validatedData = $request->validated();
        try {
            $urgency->update($validatedData);
            return response()->json(['status' => 'Status Successfully Updated !'], 200);
        } catch (\Exception $e) {
            Log::error('Error updating urgency level: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to update urgency level.'], 500);
        }
    }

    /**
     * Remove an existing urgency level.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(UrgencyLevel $urgency)
    {
        try {
            if (in_array($urgency->id, [1, 2, 3, 4])) {
                return response()->json([
                    'error' => 'Validation failed',
                    'message' => 'Deletion is not allowed for Urgency Level ID.',
                ], 422);
            }
            $urgency->delete();
        } catch (\Exception $e) {
            Log::error('Error deleting urgency level: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to delete urgency level.'], 500);
        }
        return response()->json([
            'status' => 'Urgency Level Successfully Deleted!'
        ], 200);
    }
}
