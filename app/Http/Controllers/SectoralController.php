<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSectoralRequest;
use App\Http\Requests\UpdateSectoralRequest;
use App\Models\Sectoral;

class SectoralController extends Controller
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
     * @param  \App\Http\Requests\StoreSectoralRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSectoralRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sectoral  $sectoral
     * @return \Illuminate\Http\Response
     */
    public function show(Sectoral $sectoral)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sectoral  $sectoral
     * @return \Illuminate\Http\Response
     */
    public function edit(Sectoral $sectoral)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSectoralRequest  $request
     * @param  \App\Models\Sectoral  $sectoral
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSectoralRequest $request, Sectoral $sectoral)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sectoral  $sectoral
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sectoral $sectoral)
    {
        //
    }
}