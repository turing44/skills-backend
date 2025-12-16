<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlcaldeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\CiudadanoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/alcaldes', AlcaldeController::class);
Route::apiResource('/municipios', MunicipioController::class);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/perfil', [CiudadanoController::class, 'getPerfil']);
});

//Route::get('/noticias', [NoticiaController::class, 'index']);

Route::get('/alcaldes/{id}/noticias', [AlcaldeController::class, 'getNoticias']);

Route::middleware(['auth:sanctum', 'rol:admin,alcalde'])->group(function () {
    Route::apiResource('/noticias', NoticiaController::class);
});

Route::put('/ciudadanos/{user}', [CiudadanoController::class, 'update']);
