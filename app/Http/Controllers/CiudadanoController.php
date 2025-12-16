<?php

namespace App\Http\Controllers;

use App\Models\Ciudadano;
use App\Models\User;
use App\Http\Requests\UpdateCiudadanoRequest;
use Illuminate\Http\Request;

class CiudadanoController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCiudadanoRequest $request, User $user)
    {
        $request->validated();

        $ciudadano = $user;

        $ciudadano->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'municipio_id' => $request->input('municipio_id'),
        ]);


        return response()->json($ciudadano, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ciudadano $ciudadano)
    {
        //
    }

    public function getPerfil(Request $request)
    {
        $ciudadano = $request->user()->id;

        $respuesta = User::with(['municipioCensado'])->where('id', $ciudadano)->get();

        return response()->json($respuesta , 200);
    }


}
