<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCensoRequest;
use App\Http\Requests\UpdateCensoRequest;
use App\Models\Censo;

class CensoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCensoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Censo $censo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCensoRequest $request, Censo $censo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Censo $censo)
    {
        //
    }
}
