<?php

use App\Http\Controllers\ConferenciaController;
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

Route::post('crearconferencia', [ConferenciaController::class, 'store']);
Route::get('conferencias', [ConferenciaController::class, 'index']);
Route::put('actualizarconferencia/{id}', [ConferenciaController::class, 'update']);
Route::delete('eliminarconferencia/{id}', [ConferenciaController::class, 'destroy']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request)
{
    return $request->user();
});
