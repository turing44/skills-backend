<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoticiaRequest;
use App\Http\Requests\UpdateNoticiaRequest;
use App\Models\Noticia;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Noticia::with('creador')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoticiaRequest $request)
    {

        $user = $request->user()->id;

        $noticia = Noticia::create([
            'titular' => $request->input('titular'),
            'cuerpo' => $request->input('cuerpo'),
            'fecha' => $request->input('fecha'),
            'calificacion' => $request->input('calificacion'),
            'creador_id' => $user,
        ]);


        return response()->json($noticia, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Noticia::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoticiaRequest $request, Noticia $noticia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Noticia $noticia)
    {
        //
    }
}
