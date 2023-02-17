<?php

namespace App\Http\Controllers;

use App\Models\lokasi;
use App\Http\Requests\StorelokasiRequest;
use App\Http\Requests\UpdatelokasiRequest;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorelokasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorelokasiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function show(lokasi $lokasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function edit(lokasi $lokasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatelokasiRequest  $request
     * @param  \App\Models\lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatelokasiRequest $request, lokasi $lokasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(lokasi $lokasi)
    {
        //
    }
}
