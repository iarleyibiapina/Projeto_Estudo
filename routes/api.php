<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Aqui em rotas para api, há um pequeno diferencial onde para ser chamado, deverá ter um prefixo
//  /api/ na url, este prefixo pode ser removido ou alterado na mesma pasta onde foi definido um novo arquivo de rotas

Route::get('/exemploApi', function () {
    echo "rota de api";
    return;
});
