<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use App\Http\Requests\StoredivisiRequest;
use App\Http\Requests\UpdatedivisiRequest;
use App\Http\Resources\DivisiResource;

/**
 * @group Sub Satuan Kerja
 */
class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Divisi::all());
        // $divisis = DivisiResource::collection(Divisi::all());
        $divisis = DivisiResource::collection(
            Divisi::orderBy(
                request('column') ? request('column') : 'updated_at',
                request('direction') ? request('direction') : 'desc'
            )->paginate(50)
        );
        return response()->json([
            'data' => $divisis,
        ], 200);
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
     * @param  \App\Http\Requests\StoredivisiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredivisiRequest $request)
    {
        // dd($request);
        $input = $request->validated();
        $divisi = new Divisi();
        $divisi->divisi = $input['divisi'];
        $divisi->id_satker = $input['satker'];
        $divisi->save();
        return response()->json(['status' => 'Divisi Successfully Added !'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function show(divisi $divisi)
    {
        $divisi = DivisiResource::make($divisi);
        return response()->json(['data' => $divisi], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function edit(divisi $divisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedivisiRequest  $request
     * @param  \App\Models\divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedivisiRequest $request, divisi $divisi)
    {
        $input = $request->validated();
        $divisi->divisi = $input['divisi'];
        if (array_key_exists('satker', $input) && !empty($input['satker'])) {
            $divisi->id_satker = $input['satker'];
        }
        $divisi->update();
        return response()->json(['status' => 'SubSatker Successfully Updated !'], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Divisi $divisi)
    {
        try {
            $divisi->delete();
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
