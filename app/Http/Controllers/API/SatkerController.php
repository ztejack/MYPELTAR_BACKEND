<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Satker;
use App\Http\Requests\StoresatkerRequest;
use App\Http\Requests\UpdatesatkerRequest;
use App\Http\Resources\SatkerResource;

class SatkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $satkers = Satker::all();
        return response()->json(['data' => $satkers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoresatkerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresatkerRequest $request)
    {
        $input = $request->validated();
        $satker = new Satker();
        $satker->satker = $input['satker'];
        $satker->save();
        return response()->json(['status' => 'Satker Berhasil Ditambahkan !'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\satker  $satker
     * @return \Illuminate\Http\Response
     */
    public function show(satker $satker)
    {
        $satkerr = SatkerResource::make($satker);
        return response()->json(['data' => $satkerr], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\satker  $satker
     * @return \Illuminate\Http\Response
     */
    public function edit(satker $satker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesatkerRequest  $request
     * @param  \App\Models\satker  $satker
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesatkerRequest $request, satker $satker)
    {
        $input = $request->validated();
        $satker->satker = $input['satker'];
        $satker->update();
        return response()->json(['status' => 'Satker Berhasil Diupdate !'], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\satker  $satker
     * @return \Illuminate\Http\Response
     */
    public function destroy(satker $satker)
    {
        // if (!$satker->delete()) {
        //     return response()->withErrors($satker->errors());
        // }
        try {
            $satker->delete();
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to delete resource',
            ], 500);
        }
        return response()->json([
            'status' => 'Satker Berhasil Dihapus !'
        ], 200);
    }
}
