<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storep_updateRequest;
use App\Models\PUpdate;
use App\Http\Requests\StorePUpdateRequest;
use App\Http\Requests\Updatep_updateRequest;
use App\Http\Requests\UpdatePUpdateRequest;

class PUpdateController extends Controller
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
     * @param  \App\Http\Requests\StorePUpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storep_updateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PUpdate  $PUpdate
     * @return \Illuminate\Http\Response
     */
    public function show(PUpdate $PUpdate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PUpdate  $PUpdate
     * @return \Illuminate\Http\Response
     */
    public function edit(PUpdate $PUpdate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePUpdateRequest  $request
     * @param  \App\Models\PUpdate  $PUpdate
     * @return \Illuminate\Http\Response
     */
    public function update(Updatep_updateRequest $request, PUpdate $PUpdate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PUpdate  $PUpdate
     * @return \Illuminate\Http\Response
     */
    public function destroy(PUpdate $PUpdate)
    {
        //
    }
}
