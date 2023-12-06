<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::resource('cliente', 'ClienteController');
Route::apiResource('cliente', 'ClienteController');
Route::apiResource('marca', 'MarcaController');
Route::apiResource('modelo', 'ModeloController');
Route::apiResource('carro', 'CarroController');
Route::apiResource('locacao', 'LocacaoController');
