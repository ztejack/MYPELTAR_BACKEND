<?php

namespace App\Http\Controllers;

use App\Models\p_categories;
use App\Http\Requests\Storep_categoriesRequest;
use App\Http\Requests\Updatep_categoriesRequest;

class PCategoriesController extends Controller
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
     * @param  \App\Http\Requests\Storep_categoriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storep_categoriesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\p_categories  $p_categories
     * @return \Illuminate\Http\Response
     */
    public function show(p_categories $p_categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\p_categories  $p_categories
     * @return \Illuminate\Http\Response
     */
    public function edit(p_categories $p_categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatep_categoriesRequest  $request
     * @param  \App\Models\p_categories  $p_categories
     * @return \Illuminate\Http\Response
     */
    public function update(Updatep_categoriesRequest $request, p_categories $p_categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\p_categories  $p_categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(p_categories $p_categories)
    {
        //
    }
}
