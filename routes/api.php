<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlcaldeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MunicipioController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/alcaldes', AlcaldeController::class);
Route::apiResource('/municipios', MunicipioController::class);

Route::post('/register', [AuthController::class, 'register']);