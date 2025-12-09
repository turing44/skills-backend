<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlcaldeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::where('rol', 'alcalde')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Alcalde $alcalde)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alcalde $alcalde)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alcalde $alcalde)
    {
        //
    }
}
