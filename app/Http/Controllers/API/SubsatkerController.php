<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Subsatker;
use App\Http\Requests\StoresubsatkerRequest;
use App\Http\Requests\UpdatesubsatkerRequest;
use App\Http\Resources\SubsatkerResource;

/**
 * @group Sub Satuan Kerja
 */
class SubsatkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $satkers = SubsatkerResource::collection(Subsatker::all());
        // $satkers = Subsatker::all();
        return response()->json(['data' => $satkers]);
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
     * @param  \App\Http\Requests\StoresubsatkerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresubsatkerRequest $request)
    {
        // dd($request);
        $input = $request->validated();
        $subsatker = new Subsatker();
        $subsatker->subsatker = $input['subsatker'];
        $subsatker->id_satker = $input['satker'];
        $subsatker->save();
        return response()->json(['status' => 'Subsatker Successfully Added !'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\subsatker  $subsatker
     * @return \Illuminate\Http\Response
     */
    public function show(subsatker $subsatker)
    {
        $subsatker = SubsatkerResource::make($subsatker);
        return response()->json(['data' => $subsatker], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\subsatker  $subsatker
     * @return \Illuminate\Http\Response
     */
    public function edit(subsatker $subsatker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesubsatkerRequest  $request
     * @param  \App\Models\subsatker  $subsatker
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesubsatkerRequest $request, subsatker $subsatker)
    {
        $input = $request->validated();
        $subsatker->subsatker = $input['subsatker'];
        $subsatker->id_satker = $input['satker'];
        $subsatker->update();
        return response()->json(['status' => 'SubSatker Successfully Updated !'], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\subsatker  $subsatker
     * @return \Illuminate\Http\Response
     */
    public function destroy(subsatker $subsatker)
    {
        try {
            $subsatker->delete();
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to delete resource',
            ], 500);
        }
        return response()->json([
            'status' => 'SubSatker Successfully Deleted !'
        ], 200);
    }
}
