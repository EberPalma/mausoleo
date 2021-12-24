<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NichosController;

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

Route::GET('/nichosindex', [NichosController::class, 'index'])->name('nichosIndex');
Route::POST('/nichosstore', [NichosController::class, 'store'])->name('nichosStore');
Route::GET('/nichosshow/{id}', [NichosController::class, 'show'])->name('nichosShow');
Route::PUT('/nichosupdate/{id}', [NichosController::class, 'update'])->name('nichosUpdate');
Route::DELETE('/nichosdelete/{id}', [NichosController::class, 'destroy'])->name('nichosdestroy');