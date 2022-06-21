<?php

use App\Http\Controllers\Api\CreditoController;
use App\Http\Controllers\Api\OfertaController;
use App\Http\Controllers\Api\SimulacaoCreditoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource("v1/simulacao/disponibilidade",SimulacaoCreditoController::class)->name('index','api.disponibilidade.index');
Route::apiResource("v1/simulacao/credito",CreditoController::class)->name('index','api.credito.index');
Route::apiResource("v1/simulacao/oferta",OfertaController::class)->name('index','api.oferta.index');