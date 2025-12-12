<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterRequest $request) {
        
        $request->validated();

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),

            'rol' => $request->input('rol'),
            'municipio_id' => $request->input('municipio_id'),
        ]);


        $token = $user->createToken('api_token')->plainTextToken;


        return response()->json([
            'user' => $user,
            'token' => $token,
        ], 201);

    }

    public function login(LoginRequest $request) {

        $request->validated();

        $user = User::where('email', $request->input('email'))->first();

        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            return response()->json('Credenciales incorrectas', 401);
        }


        $token = $user->createToken('api_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ], 200);

    }

    public function logout(Request $request) {
        $user = $request->user();

        $user->tokens()->delete();

        return response(null, 204);

    }
}
