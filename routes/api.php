<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('fluxo','FluxoController');
Route::apiResource('assunto','AssuntoController');
Route::apiResource('link','LinkController');
Route::apiResource('departamento','DepartamentoController');
Route::apiResource('fechamento','FechamentoController');
Route::apiResource('execucao','ExecucaoController');
