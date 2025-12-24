<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMunicipioRequest;
use App\Http\Requests\UpdateMunicipioRequest;
use App\Models\Municipio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'max' => ['nullable', 'in:10,25,50,100']
        ]);

        $max = $request->query('max', 10);

        return Municipio::with(['admin', 'alcalde'])->limit($max)->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMunicipioRequest $request)
    {
        $request->validated();

        $municipio = Municipio::create([
            'nombre' => 'Nombre por defecto',
            'admin_id' => $request->user()->id,
            'alcalde_id' => $request->input('alcalde_id'),
            'poblacion_verano' => $request->input('poblacion_verano'),
            'poblacion_fiestas' => $request->input('poblacion_verano'),
            'poblacion_censada' => $request->input('poblacion_verano'),
        ]);

        return response()->json($municipio, 201);

    }



    public function renombrar(Request $request, Municipio $municipio)
    {
        $municipio->nombre = $request->input('nombre');

        $municipio->save();
        return response()->json($municipio, 200);
    }


    /**
     * Display the specified resource.
     */
    public function show(Municipio $municipio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Municipio $municipio)
    {
        $user = Auth::user();

        $municipio->admin_id = $user->id;

        $municipio->save();

        return $municipio;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Municipio $municipio)
    {
        //
    }
}
