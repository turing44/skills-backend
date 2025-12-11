<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
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
}
