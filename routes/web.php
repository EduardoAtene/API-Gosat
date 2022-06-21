<?php

use App\Http\Controllers\Consulta;
use App\Http\Controllers\DisponibilidadeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::resource("/consulta",Consulta::class);

Route::controller(Consulta::class)->group(function(){
    Route::get('/','index')->name('consulta.index');
    Route::get('/create','create')->name('consulta.create');
    Route::post('/store','store')->name('consulta.store');
    Route::get('/consulta/{cpf}','show')->name('consulta.show');
});

Route::controller(DisponibilidadeController::class)->group(function(){
    Route::get('/disponibilidade/index','index')->name('disponibilidade.index');
    Route::post('/disponibilidade/store','store')->name('disponibilidade.store');

});

