<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NichosController;
use App\Http\Controllers\ClientesController;

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

//Rutas para los nichos
Route::GET('/nichosindex', [NichosController::class, 'index'])->name('nichosIndex');
Route::POST('/nichosstore', [NichosController::class, 'store'])->name('nichosStore');
Route::GET('/nichosshow/{id}', [NichosController::class, 'show'])->name('nichosShow');
Route::PUT('/nichosupdate/{id}', [NichosController::class, 'update'])->name('nichosUpdate');
Route::GET('/nichosdelete/{id}', [NichosController::class, 'destroy'])->name('nichosdestroy');

//Rutas para los clientes
Route::GET('/clientesindex', [ClientesController::class, 'index'])->name('clientesIndex');
Route::POST('/clientesstore', [ClientesController::class, 'store'])->name('clientesStore');
Route::GET('/clientesshow/{id}', [ClientesController::class, 'show'])->name('clientesShow');
Route::PUT('/clientesupdate/{id}', [ClientesController::class, 'update'])->name('clientesUpdate');
Route::GET('/clientesdelete/{id}', [ClientesController::class, 'destroy'])->name('clientesdestroy');
