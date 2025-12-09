<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBaileRequest;
use App\Http\Requests\UpdateBaileRequest;
use App\Models\Baile;

class BaileController extends Controller
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
    public function store(StoreBaileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Baile $baile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBaileRequest $request, Baile $baile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Baile $baile)
    {
        //
    }
}
