<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlcaldeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\CiudadanoController;
use App\Http\Controllers\ConsejeroController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\BaileController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/municipios', [MunicipioController::class, 'index']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/me', [CiudadanoController::class, 'getPerfil']);
});


Route::middleware(['auth:sanctum', 'rol:ciudadano'])->group(function () {
    Route::get('/me/eventos', [CiudadanoController::class, 'getEventos']);

    Route::get('/me/municipios', [CiudadanoController::class, 'getMunicipios']);

    Route::get('/me/bailes', [CiudadanoController::class, 'getBailes']);

    Route::post('/eventos/{evento}/inscripciones', [CiudadanoController::class, 'inscribirse']);
    Route::delete('/eventos/{evento}/inscripciones/me', [CiudadanoController::class, 'desinscribirse']);
    
    Route::post('/bailes/{baile}/inscripciones', [BaileController::class, 'inscribirse']);
    Route::delete('/bailes/{baile}/inscripciones/me', [BaileController::class, 'desinscribirse']);
});


Route::middleware(['auth:sanctum', 'rol:admin'])->group(function () {
    Route::post('/alcaldes', [AlcaldeController::class, 'registrarAlcalde']);
    Route::post('/municipios', [MunicipioController::class, 'store']);
});


Route::middleware(['auth:sanctum', 'rol:alcalde'])->group(function () {
    Route::put('/municipios/{municipio}/nombre', [MunicipioController::class, 'cambiarNombre']);
});


Route::middleware(['auth:sanctum', 'rol:admin,alcalde'])->group(function () {
    Route::put('/municipios/{municipio}', [MunicipioController::class, 'gestionar']);

    Route::get('/municipios/{municipio}/consejeros', [ConsejeroController::class, 'index']);    
    Route::post('/municipios/{municipio}/consejeros', [ConsejeroController::class, 'store']);    
    Route::put('/municipios/{municipio}/consejeros/{consejero}', [ConsejeroController::class, 'update']);    
    Route::delete('/municipios/{municipio}/consejeros/{consejero}', [ConsejeroController::class, 'delete']);    

    Route::get('/eventos/inscripciones', [EventoController::class, 'getInscripciones']);
    Route::get('/eventos/{evento}/inscripciones', [EventoController::class, 'getInscipcionEvento']);

    Route::apiResource('noticias', NoticiaController::class)->except(['destroy']);
    Route::apiResource('eventos', EventoController::class)->except('destroy');
    Route::apiResource('bailes', BaileController::class);
});
