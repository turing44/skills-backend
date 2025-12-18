<?php

namespace App\Http\Controllers;

use App\Models\Ciudadano;
use App\Models\User;
use App\Models\Evento;
use App\Models\InscripcionEvento;
use App\Http\Requests\UpdateCiudadanoRequest;
use App\Http\Requests\InscripcionEventoRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class CiudadanoController extends Controller
{

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


    public function inscribirseEnEvento(Evento $evento) {

        $user = Auth::user();

        $yaInscrito = InscripcionEvento::where('user_id', $user->id)
                            ->where('evento_id', $evento->id)
                            ->whereNull('fecha_baja')
                            ->exists();

        if ($yaInscrito) {
            return response()->json('Ya esta inscrito en este evento', 409);
        }

        $inscripcion = InscripcionEvento::create([
            'user_id' => $user->id,
            'evento_id' => $evento->id,
            'fecha_alta' => now(),
            'fecha_baja' => null,
        ]);

        return response()->json($inscripcion, 201);

    }


    public function getInscripcionesEnEventos(Request $request)
    {
        $ciudadano = $request->user();

        $eventos = $ciudadano->eventos;

        $preciosTotales = $ciudadano->eventos()->pluck('precio');

        $precioTotal = 0;

        foreach ($preciosTotales as $precio) {
            $precioTotal += $precio;
        }



        return response()->json([
            'precio_total' => number_format($precioTotal, 2, '.', ''),
            'eventos' => $eventos
        ], 200);
    }

    public function getEventosDisponibles(Request $request)
    {
        $ciudadano = $request->user();

        $eventosInscritos = $ciudadano->eventos()->pluck('eventos.id');

        $respuesta = Evento::whereNotIn('id', $eventosInscritos)->get();

        return response()->json($respuesta , 200);
    }


}
