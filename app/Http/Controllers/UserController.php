<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function getPerfil(Request $request)
    {
        $ciudadano = $request->user()->id;

        $respuesta = User::where('id', $ciudadano)->get();

        return response()->json($respuesta , 200);
    }

    public function getMunicipio() {
        $user = Auth::user();

        $rol = $user->rol;

        if ($rol === 'ciudadano') {
            return response()->json(
                $user->load('municipioCensado')
            , 200);
        }

        if ($rol === 'alcalde') {
            return response()->json(
                $user->load('municipioGobernado')
            , 200);
        }

        if ($rol === 'admin') {
            return response()->json(
                $user->with('municipiosAdministrados')
            , 200);
        }

        return response()->json('Rol no valido', 400);
    }
}
